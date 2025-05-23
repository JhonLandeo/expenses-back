<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->pluck('id', 'name');

        DB::table('sub_categories')->insert([
            // Fijos
            ['name' => 'Vivienda', 'category_id' => $categories['Fijos'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Telefonia', 'category_id' => $categories['Fijos'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Servicios básicos', 'category_id' => $categories['Fijos'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Seguros', 'category_id' => $categories['Fijos'], 'created_at' => now(), 'updated_at' => now()],
            // Variables
            ['name' => 'Salario', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transporte', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alimentación', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Entretenimiento', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Prestamos', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salud', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Vestimenta', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Donaciones', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Favores', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Educacion', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Viajes', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Freelance', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bienestar Personal', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Alimentacion fuera de casa', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gastos para mi enamorada', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Intereses', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Transferencia interna', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Regalos y detalles', 'category_id' => $categories['Variables'], 'created_at' => now(), 'updated_at' => now()],
            // Ahorro
            ['name' => 'Inversiones', 'category_id' => $categories['Ahorro'], 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Fondo de emergencia', 'category_id' => $categories['Ahorro'], 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
