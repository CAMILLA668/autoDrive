<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
use App\Http\Requests\MarcaRequest;

class MarcaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Chevrolet',
             'Toyota',
             'Volkswagen'
        ];

        foreach($marcas as $marca) {
            Marca::FirstOrCreate([
                'nome' => $marca,
            ]);
        }
    }
}