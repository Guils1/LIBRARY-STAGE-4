<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomersRequest;
use App\Http\Requests\UpdateCustomersRequest;
use App\Models\Customers;

class CustomersController extends Controller
{
    protected $customers;

    public function __construct(Customers $customers)
    {
        $this->customers = $customers;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Instaciando objeto
        $customers = Customers::all();

        return response($this->customers->get(), 200);
        // return response(view('layouts.books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomersRequest $request)
    {
        // Validação
        $request->validate($this->customers->rules(), $this->customers->feedback());
        // Instanciando objeto
        Customers::create($request->all());
        // Corfimação do create com tratamento e código de status
        return response(
            ['msg' => 'Cliente criado com sucesso'], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customers $customers
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Instanciando objeto
        $books = $this->customers->find($id);

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
     * @param  \App\Http\Requests\UpdateCustomersRequest  $request
     * @param  \App\Models\Customers  $Customers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomersRequest $request, Customers $customers, $id)
    {
        // Instanciando objeto
        Customers::find($id);
        
        // Regras de validação para o método patch
        $rulesD = array();
        if($request->method() === "PATCH") {

            // Percorrendo regras definida no model
            foreach($this->customers->rules() as $input => $regra) {

            // Coletando apenas regras aplicaveis aos parametros passado na requisição
               if(array_key_exists($input, $request->all())) {
                    $rulesD[$input] = $regra;
               }
            }
            
            // Validação para o método patch
            $request->validate($rulesD, $this->customers->feedback());
        
        } else {
            // Validação para o método put
            $request->validate($this->customers->rules(), $this->customers->feedback());
        }

        // Controle de fluxos com códigos de status
        if ($customers === null) {
            return response(
                ['erro' => 'Não foi possível atualizar, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Atualização dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $customers->update($request->all());
            return response(
                ['msg' => 'Author atualizado com sucesso'], 200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customers $customers, $id)
    {
        // Instanciando objeto
        $books = Customers::find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Não foi possível realizar a exclusão, pois o recurso solicitado não existe'], 404
            );      
        } else {
            // Deletação dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $books->delete();
            return response(
                ['msg' => 'Cliente deletado com sucesso'], 200
            );
        }
    }
}