<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Sistema ERP para PyMEs', 'description' => 'Software de gestion empresarial completo', 'price' => 250.00, 'stock' => 50],
            ['name' => 'Modulo de Facturacion Fiscal', 'description' => 'Adaptado a normativas locales', 'price' => 120.00, 'stock' => 100],
            ['name' => 'Soporte Tecnico Anual', 'description' => 'Poliza de mantenimiento preventivo y correctivo', 'price' => 300.00, 'stock' => 30],
            ['name' => 'Consultoria de Procesos', 'description' => 'Asesoria comercial y de flujos de trabajo', 'price' => 80.00, 'stock' => 200],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}