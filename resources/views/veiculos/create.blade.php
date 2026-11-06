@extends('layouts.app')
@section('content')
<div class="card col-md-8 mx-auto">
    <div class="card-header fw-bold">Cadastrar Veículo</div>
    <div class="card-body">
        <form action="{{ route('veiculos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Marca</label>
                <select name="marca_id" class="form-select @error('marca_id') is-invalid
@enderror" required>
                    <option value="">Selecione...</option>
                    @foreach($marcas as $marca)
                    <option value="{{ $marca->id }}" @selected(old('marca_id')==$marca->id)>{{ $marca->nome }}</option>
                    @endforeach
                </select>
                @error('marca_id') <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Modelo</label>
                <input type="text" name="modelo" class="form-control @error('modelo') isinvalid @enderror"
                    value="{{ old('modelo') }}" required>
                @error('modelo') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Ano</label>
                    <input type="number" name="ano" class="form-control" value="{{ old('ano',
2024) }}" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Preço (R$)</label>
                    <input type="number" step="0.01" name="preco" class="form-control" value="{{ old('preco') }}"
                        required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="disponivel">Disponível</option>
                        <option value="reservado">Reservado</option>
                        <option value="vendido">Vendido</option>
                    </select>
                </div>
            </div>
            <button class="btn btn-success">Salvar Veículo</button>
            <a href="{{ route('veiculos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>
@endsection