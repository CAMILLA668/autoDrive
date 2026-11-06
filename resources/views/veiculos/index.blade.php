@extends('layouts.app')
@section('content')
<div class="row mb-3">
    <div class="col-md-8">
        <h1 class="h3">Estoque de Veículos</h1>
    </div>
</div>
<form method="GET" action="{{ route('veiculos.index') }}" class="card card-body mb-4">
    <div class="row g-2">
        <div class="col-md-5">
            <input type="text" name="busca" class="form-control" placeholder="Buscar por
modelo..." value="{{ request('busca') }}">
        </div>
        <div class="col-md-5">
            <select name="marca_id" class="form-select">
                <option value="">Todas as Marcas</option>
                @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" @selected(request('marca_id')==$marca->id)>{{ $marca->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2"><button class="btn btn-primary w-100">Filtrar</button></div>
    </div>
</form>
<div class="row g-3">
    @forelse($veiculos as $veiculo)
    <div class="col-md-4">
        <div class="card h-100 shadow-sm">
            <div class="card-body">
                <span class="badge bg-secondary mb-2">{{ $veiculo->marca->nome }}</span>
                <h2 class="h5 card-title">{{ $veiculo->modelo }}</h2>
                <p class="text-muted mb-1">Ano: {{ $veiculo->ano }}</p>
                <h4 class="text-primary h6">R$ {{ number_format($veiculo->preco, 2, ',',
'.') }}</h4>
                <span class="badge bg-{{ $veiculo->status == 'disponivel' ? 'success' :
($veiculo->status == 'reservado' ? 'warning' : 'danger') }}">
                    {{ ucfirst($veiculo->status) }}
                </span>
            </div>
            <div class="card-footer bg-white border-0 text-end">
                <a href="{{ route('veiculos.edit', $veiculo) }}" class="btn btn-sm btnoutline-primary">Editar</a>
                <form action="{{ route('veiculos.destroy', $veiculo) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" onclick="return
confirm('Excluir veículo?')">Excluir</button>
                </form>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Nenhum veículo encontrado.</div>
    </div>
    @endforelse
</div>
@endsection