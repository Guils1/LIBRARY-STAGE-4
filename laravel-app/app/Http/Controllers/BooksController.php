<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Books;

class BooksController extends Controller
{
    protected $books;

    public function __construct(Books $books)
    {
        $this->books = $books;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Instaciando objeto
        $books = books::all();
        
        return response($this->books->with('authors', 'genres')->get(), 200);
        // return response(view('layouts.books'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBooksRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBooksRequest $request)
    {
        // Validação
        $request->validate($this->books->rules(), $this->books->feedback());
        // Instanciando objeto
        books::create($request->all());
        // Corfimação do create com tratamento e código de status
        return response(
            ['msg' => 'Livro criado com sucesso'], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books, $id)
    {
        // Instanciando objeto
        $books = $this->books->with('authors', 'genres')->find($id);

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
     * @param  \App\Http\Requests\UpdateBooksRequest  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBooksRequest $request, Books $books, $id)
    {
        // Instanciando objeto
        books::find($id);
        
        // Regras de validação para o método patch
        $rulesD = array();
        if($request->method() === "PATCH") {

        // Percorrendo regras definida no model
        foreach($this->books->rules() as $input => $regra) {

        // Coletando apenas regras aplicaveis aos parametros passado na requisição
            if(array_key_exists($input, $request->all())) {
                $rulesD[$input] = $regra;
            }
        }
            
            // Validação para o método patch
            $request->validate($rulesD, $this->books->feedback());
        
        } else {
            // Validação para o método put
            $request->validate($this->books->rules(), $this->books->feedback());
        }

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Não foi possível atualizar, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Atualização dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $books->update($request->all());
            return response(
                ['msg' => 'Author atualizado com sucesso'], 200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books, $id)
    {
        // Instanciando objeto
        $books = books::find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Não foi possível realizar a exclusão, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Deletação dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $books->delete();
            return response(
                ['msg' => 'Livro deletado com sucesso'], 200
            );
        }
    }
}