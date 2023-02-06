<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuppliersRequest;
use App\Http\Requests\UpdateSuppliersRequest;
use App\Models\Suppliers;

class SuppliersController extends Controller
{
    protected $suppliers;

    public function __construct(Suppliers $suppliers)
    {
        $this->suppliers = $suppliers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Instaciando objeto
        $suppliers = Suppliers::all();

        return response($this->suppliers->get(), 200);
        // return response(view('layouts.books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuppliersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuppliersRequest $request)
    {
        // Validação
        $request->validate($this->suppliers->rules(), $this->suppliers->feedback());
        // Instanciando objeto
        Suppliers::create($request->all());
        // Corfimação do create com tratamento e código de status
        return response(
            ['msg' => 'Fornecedor criado com sucesso'], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Instanciando objeto
        $books = $this->suppliers   ->find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Autor não existe'], 404
            );
        } else {
            return response($books);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuppliersRequest  $request
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuppliersRequest $request, Suppliers $suppliers, $id)
    {
        // Instanciando objeto
        Suppliers::find($id);
        
        // Regras de validação para o método patch
        $rulesD = array();
        if($request->method() === "PATCH") {

            // Percorrendo regras definida no model
            foreach($this->suppliers->rules() as $input => $regra) {

            // Coletando apenas regras aplicaveis aos parametros passado na requisição
               if(array_key_exists($input, $request->all())) {
                    $rulesD[$input] = $regra;
               }
            }
            
            // Validação para o método patch
            $request->validate($rulesD, $this->suppliers->feedback());
        
        } else {
            // Validação para o método put
            $request->validate($this->suppliers->rules(), $this->suppliers->feedback());
        }

        // Controle de fluxos com códigos de status
        if ($suppliers === null) {
            return response(
                ['erro' => 'Não foi possível atualizar, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Atualização dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $suppliers->update($request->all());
            return response(
                ['msg' => 'Author atualizado com sucesso'], 200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suppliers  $suppliers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suppliers $suppliers, $id)
    {
        // Instanciando objeto
        $books = Suppliers::find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Não foi possível realizar a exclusão, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Deletação dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $books->delete();
            return response(
                ['msg' => 'Fornecedor deletado com sucesso'], 200
            );
        }
    }
}