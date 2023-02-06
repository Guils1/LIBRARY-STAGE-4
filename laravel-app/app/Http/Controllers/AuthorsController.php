<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;
use App\Models\Authors;
use Illuminate\Support\Facades\Auth;

class AuthorsController extends Controller
{

    protected $authors;

    public function __construct(authors $authors) {
        $this->authors = $authors;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->email);

        // Instaciando objeto
        authors::all();
        
        return response($this->authors->with('books')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorsRequest $request)
    {
        // Validação
        $request->validate($this->authors->rules(), $this->authors->feedback());
        
        // Instanciando objeto
        $photo = $request->file('photo');
        $photo_urn = $photo->store('images/authors', 'public');
        
        authors::create([
            'name' => $request->name,
            'photo' => $photo_urn,
            'biography' => $request->biography,
        ]);
        
        // Corfimação do create com tratamento e código de status
        return response(
            ['msg' => 'Author criado com sucesso'], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function show(Authors $authors, $id)
    {
        // dd(Auth::user());
        // Instanciando objeto
        $authors = $this->authors->with('books')->find($id);

        // Controle de fluxos com códigos de status
        if ($authors === null) {
            return response(
                ['erro' => 'Autor não existe'], 404
            );
        } else {
            return response($authors);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorsRequest  $request
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorsRequest $request, Authors $authors, $id)
    {
        // Instanciando objeto
        authors::find($id);

        // Regras de validação para o método patch
        $rulesD = array();
        if($request->method() === "PATCH") {

            // Percorrendo regras definida no model
            foreach($this->authors->rules() as $input => $regra) {

            // Coletando apenas regras aplicaveis aos parametros passado na requisição
            if(array_key_exists($input, $request->all())) {
                    $rulesD[$input] = $regra;
            }
            }
            
            // Validação para o método patch
            $request->validate($rulesD, $this->authors->feedback());
        
        } else {
            // Validação para o método put
            $request->validate($this->authors->rules(), $this->authors->feedback());
        }

        // Controle de fluxos com códigos de status
        if ($authors === null) {
            return response(
                ['erro' => 'Não foi possível atualizar, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Atualização dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $authors->update($request->all());
            return response(
                ['msg' => 'Author atualizado com sucesso'], 200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Authors  $authors
     * @return \Illuminate\Http\Response
     */
    public function destroy(Authors $authors, $id)
    {
        // Instanciando objeto
        $authors = authors::find($id);

        // Controle de fluxos com códigos de status
        if ($authors === null) {
            return response(
                ['erro' => 'Não foi possível realizar a exclusão, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Deletação dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $authors->delete();
            return response(
                ['msg' => 'Author deletado com sucesso'], 200
            );
        }
    }
}