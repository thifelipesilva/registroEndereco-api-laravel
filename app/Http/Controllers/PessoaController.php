<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::select('id as codigoPessoa', 'nome', 'sobrenome', 'idade', 'login', 'senha', 'status')
                        ->get();
        return response()->json($pessoas);
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PessoaFormRequest $request)
    {
        Pessoa::create($request->all());
        return response()->json('menssagem: Pessoa cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pessoa = Pessoa::select('id as codigoPessoa', 'nome', 'sobrenome', 'idade', 'login', 'senha', 'status')
                        ->where('id', $id)
                        ->get();
        return response()->json($pessoa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaFormRequest $request, $id)
    {
        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());
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
        //return Pessoa::destroy($id);
    }

    public function mostrarEndereco($id)
    {
        $enderecoUsuario = DB::table('pessoas')
                            ->select('id as codigoPessoa', 'nome', 'sobrenome', 'idade', 'login', 'senha', 'status')
                            
                            ->join('enderecos', 'pessoas.id', '=', 'enderecos.codigoPessoa')
                            ->select('pessoas.*', 'enderecos.*')
                            ->get();
        return $enderecoUsuario;
    }

}
