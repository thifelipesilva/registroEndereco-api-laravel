<?php

namespace App\Http\Controllers;

use App\Http\Requests\CidadeFormRequest;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cidades = Cidade::select('id as codigoMunicipio', 'codigoUf', 'nome', 'status')->get();
        return response()->json($cidades);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CidadeFormRequest $request)
    {
        Cidade::create($request->all());
        return response()->json('menssagem: Município criado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cidade = Cidade::select('id as codigoMunicipio', 'codigoUf', 'nome', 'status')
                        ->where('id', $id)
                        ->get();
        return response()->json($cidade);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CidadeFormRequest $request, $id)
    {
        $cidade = Cidade::find($id);
        $cidade->update($request->all());
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
        //return Cidade::destroy($id);
        return response()->json('mensagem: Não é possivel apagar um registro');
    }
}
