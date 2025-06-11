<?php
    use App\Http\Controllers\EntregaController;
    use Illuminate\Support\Facades\Route;

    Route::get('/entregas', [EntregaController::class, 'buscarPorCpf']);
    Route::get('/entregas/{id}', [EntregaController::class, 'detalharEntrega']);