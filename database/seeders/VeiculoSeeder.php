<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\VeiculoRequest;
use App\Models\Veiculo;

class VeiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('veiculos')->insert([
            [
            'marca_id' => 1,
            'modelo'   => 'Onix',
            'ano'      => 2002,
            'preco'    => 90000,
            'status'   => 'vendido',
            ],

            [
            'marca_id' => 2,
            'modelo'   => 'Corolla',
            'ano'      => 2014,
            'preco'    => 60000,
            'status'   => 'reservado',
            ],

            [
            'marca_id' => 3,
            'modelo'   => 'Polo',
            'ano'      => 2000,
            'preco'    => 80000,
            'status'   => 'disponivel',
            ],

            [
            'marca_id' => 1,
            'modelo'   => 'OnixPlus',
            'ano'      => 2020,
            'preco'    => 100000,
            'status'   => 'disponivel',
            ],

        ]);
    }
}