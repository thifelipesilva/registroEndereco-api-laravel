<?php

namespace App\Http\Controllers;

use App\Http\Requests\BairroFormRequest;
use App\Models\Bairro;
use Illuminate\Http\Request;

class BairroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bairros = Bairro::select('id as codigoBairro', 'codigoMunicipio', 'nome', 'status')->get();
        return response()->json($bairros);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BairroFormRequest $request)
    {
        Bairro::create($request->all());
        return response()->json('Menssagem: Bairro cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bairro = Bairro::select('id as codigoBairro', 'codigoMunicipio', 'nome', 'status')
                        ->where('id', $id)
                        ->get();
        return response()->json($bairro);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BairroFormRequest $request, $id)
    {
        $bairro = Bairro::find($id);
        $bairro->update($request->all());
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
        return response()->json('mensagem: Não é possivel apagar um registro');
    }
}
