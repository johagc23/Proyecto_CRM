<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Origin;

class OriginSeeder extends Seeder
{
    public function run(): void
    {
        $origins = [
            ['name' => 'Redes Sociales'],
            ['name' => 'Recomendacion'],
            ['name' => 'Web'],
            ['name' => 'Evento'],
            ['name' => 'Otro'],
        ];

        foreach ($origins as $origin) {
            Origin::create($origin);
        }
    }
}
