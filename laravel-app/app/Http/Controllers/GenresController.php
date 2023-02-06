<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGenresRequest;
use App\Http\Requests\UpdateGenresRequest;
use App\Models\Genres;

class GenresController extends Controller
{
    protected $genres;

    public function __construct(Genres $genres)
    {
        $this->genres = $genres;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Instaciando objeto
        $books = Genres::all();
        
        return response($this->genres->with('books')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGenresRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGenresRequest $request)
    {
        // Validação
        $request->validate($this->genres->rules(), $this->genres->feedback());
        // Instanciando objeto
        Genres::create($request->all());
        // Corfimação do create com tratamento e código de status
        return response(
            ['msg' => 'Gênero criado com sucesso'], 201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function show(Genres $genres, $id)
    {
        // Instanciando objeto
        $books = $this->genres->with('books')->find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Gênero não existe'], 404
            );
        } else {
            return response($books);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGenresRequest  $request
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGenresRequest $request, Genres $genres, $id)
    {
        // Instanciando objeto
        Genres::find($id);
        
        // Regras de validação para o método patch
        $rulesD = array();
        if($request->method() === "PATCH") {

            // Percorrendo regras definida no model
            foreach($this->genres->rules() as $input => $regra) {

            // Coletando apenas regras aplicaveis aos parametros passado na requisição
               if(array_key_exists($input, $request->all())) {
                    $rulesD[$input] = $regra;
               }
            }
            
            // Validação para o método patch
            $request->validate($rulesD, $this->genres->feedback());
        
        } else {
            // Validação para o método put
            $request->validate($this->genres->rules(), $this->genres->feedback());
        }

        // Controle de fluxos com códigos de status
        if ($genres === null) {
            return response(
                ['erro' => 'Não foi possível atualizar, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Atualização dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $genres->update($request->all());
            return response(
                ['msg' => 'Gênero atualizado com sucesso'], 200
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genres  $genres
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genres $genres, $id)
    {
        // Instanciando objeto
        $books = Genres::find($id);

        // Controle de fluxos com códigos de status
        if ($books === null) {
            return response(
                ['erro' => 'Não foi possível realizar a exclusão, pois o recurso solicitado não existe'], 404
            );
        } else {
            // Deletação dos dados e retorno com tratamento para página {{ nome da página }} com código de status
            $books->delete();
            return response(
                ['msg' => 'Gênero deletado com sucesso'], 200
            );
        }
    }
}