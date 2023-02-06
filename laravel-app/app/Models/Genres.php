<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function rules() {
        return [
            'name' => 'required|unique:books,name,'.$this->id.'|min:3',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'name.unique' => 'O nome do livro já existe',
            'name.min' => 'O nome deve ter no minímo 3 caracteres'
        ];
    }

    public function books() {
        // N-1 - Um autor pode ter mais de um livro
        return $this->hasMany('App\Models\Books');
    }
}
