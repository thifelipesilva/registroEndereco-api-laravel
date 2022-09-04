<?php

namespace App\Http\Controllers;

use App\Http\Requests\EstadoFormRequest;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estados = Estado::select('id as codigoUf', 'sigla', 'nome', 'status')->get();
        return response()->json($estados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstadoFormRequest $request)
    {
        Estado::create($request->all());
        return response()->json('menssagem: Uf cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estado = Estado::select('id as codigoUf', 'sigla', 'nome', 'status')
            ->where('id', $id)
            ->get();
        return response()->json($estado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EstadoFormRequest $request, $id)
    {
        $estado = Estado::find($id);
        $estado->update($request->all());
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Estado::destroy($id);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCidades($id)
    {
        return response()->json('mensagem: Não é possivel apagar um registro');
        //return Estado::find($id)->cidades;
    }

    
}
