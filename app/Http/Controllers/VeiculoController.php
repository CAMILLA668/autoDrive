<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Veiculo;
use App\Http\Requests\VeiculoRequest;
use App\Http\Requests\MarcaRequest;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $marcas = Marca::query()->orderBy('nome')->get();

        $veiculos = Veiculo::with('marca')
            ->when($request->filled('busca'), function ($query) use ($request) {
                $query->where('modelo', 'like', "%{$request->busca}%");
            })
            ->when($request->filled('marca_id'), function ($query) use ($request) {
                $query->where('marca_id', $request->marca_id);
            })
            ->get();

        return view('veiculos.index', compact('marcas', 'veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('veiculos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VeiculoRequest $request)
    {
        Veiculo::create($request->validated());

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veiculo criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $veiculo = Veiculo::all();

        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VeiculoRequest $request, Veiculo $veiculos)
    {
        $veiculo->update($request->validated());

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veiculo atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();

        return redirect()
            ->route('veiculos.index')
            ->with('success', 'Veiculo excluido com sucesso!');
    }
}