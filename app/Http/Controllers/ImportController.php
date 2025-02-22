<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use App\Models\FinancialEntity;
use App\Models\Import;
use App\Models\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ImportController extends Controller
{

    public function __construct(private PdfController $pdfController) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);

        $query = DB::table('imports as i')
            ->select('i.*', 'fe.name as financial_name')
            ->leftJoin('financial_entities as fe', 'financial_id', '=', 'fe.id')
            ->where('user_id', $request->user_id);

        $data = $query->paginate($perPage, ['*'], 'page', $page);

        $data->getCollection()->transform(function ($item) {
            $url = Storage::url('file/' . $item->name);
            $item->url = $url;
            return $item;
        });

        return response()->json($data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PdfRequest $request)
    {
        try {
            $file = $request->file('file');
            $originalName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $size = $file->getSize();
            $file->store('files');
            $mime = Storage::mimeType($file);
            $path = Storage::path($file);
            $url = Storage::url($file);

            DB::beginTransaction();
            DB::table('imports')->insert([
                'name' => $originalName,
                'extension' => $extension,
                'path' => $path,
                'mime' => $mime,
                'url' => $url,
                'size' => $size,
                'user_id' => $request->user_id,
                'financial_id' => $request->financial,
                'created_at' => now()
            ]);


            $this->pdfController->extractData($request);
            DB::commit();

            return response()->json(['status' => 'ok']);
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Import $import)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Import $import)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Import $import)
    {
        return $import->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Import $import)
    {
        return $import->delete();
    }


    public function getBank()
    {
        return FinancialEntity::get();
    }

    public function getService()
    {
        return PaymentService::get();
    }
}
