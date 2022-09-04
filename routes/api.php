<?php

use App\Http\Controllers\EstadoController;
use App\Http\Controllers\CidadeController;
use App\Http\Controllers\BairroController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\PessoaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('estados', EstadoController::class);

Route::apiResource('cidades', CidadeController::class);

Route::apiResource('bairros', BairroController::class);

Route::apiResource('pessoas', PessoaController::class);


Route::get('estados/{estado}/cidades', [EstadoController::class, 'showCidades']);




Route::get('pessoas/{pessoa}/enderecos', [PessoaController::class, 'mostrarEndereco']);