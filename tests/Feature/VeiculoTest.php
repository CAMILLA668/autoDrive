<?php

namespace Tests\Feature;

use App\Models\Marca;
use App\Models\Veiculo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VeiculoTest extends TestCase
{
    use RefreshDatabase; // Garante banco limpo a cada teste

    /** @test */
    public function permite_cadastrar_um_veiculo_valido()
    {
        // 1. ARRANGE (Preparação)
        $marca = Marca::create([
            'nome' => 'Toyota'
        ]);

        // 2. ACT (Ação)
        $response = $this->post(route('veiculos.store'), [
            'marca_id' => $marca->id,
            'modelo'   => 'Corolla 2.0 XE',
            'ano'      => 2023,
            'preco'    => 120000.00,
            'status'   => 'disponivel',
        ]);

        // 3. ASSERT (Verificação)
        $response->assertRedirect(route('veiculos.index'));

        $this->assertDatabaseHas('veiculos', [
            'modelo'   => 'Corolla 2.0 XE',
            'marca_id' => $marca->id,
        ]);
    }

    /** @test */
    public function impede_exclusao_de_marca_com_veiculos_vinculados()
    {
        // ARRANGE
        $marca = Marca::create([
            'nome' => 'Honda'
        ]);

        Veiculo::create([
            'marca_id' => $marca->id,
            'modelo'   => 'Civic 2.0',
            'ano'      => 2021,
            'preco'    => 95000.00,
            'status'   => 'disponivel',
        ]);

        // ACT
        $response = $this->delete(route('marcas.destroy', $marca));

        // ASSERT (Garante erro na sessão e marca mantida no banco)
        $response->assertSessionHas('error');

        $this->assertDatabaseHas('marcas', [
            'id' => $marca->id,
        ]);
    }
}