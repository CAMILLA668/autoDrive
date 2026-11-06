<?php

use App\Http\Controllers\VeiculoController;
use Illuminate\Support\Facades\Route;

Route::resource('veiculos', VeiculoController::class);
Route::get('/layouts', [VeiculoController::class, 'index'])->name('marcas.index');