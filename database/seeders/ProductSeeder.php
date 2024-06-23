<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'mypime_nit' => '1231232123', // NIT de un MyPime creado
                'nombre_product' => 'Producto 1',
                'price_product' => 19.99,
                'description' => 'Descripción del producto 1',
                'status' => 'disponible',
                'image' => 'producto1.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'mypime_nit' => '1231232123', // NIT de un MyPime creado
                'nombre_product' => 'Producto 2',
                'price_product' => 29.99,
                'description' => 'Descripción del producto 2',
                'status' => 'disponible',
                'image' => 'producto2.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Agrega más productos según sea necesario
        ]);
    }
}
