<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $dates = ['delete_at'];

    protected $fillable = [
        'name',
        'address',
        'email',
        'favorite_genre',
    ];

    public function rules() {
        return [
            'name' => 'required|unique:books,name,'.$this->id.'|min:3',
            'address' => 'required',
            'email' => 'required|max:50',
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'integer' => 'O valor de :attribute precisa ser um número inteiro',
            'name.unique' => 'O nome do fornecedor já existe',
            'name.min' => 'O nome deve ter no minímo 3 caracteres',
            'email.max' => 'O email deve ter no máximo 50 caracteres',
            'contact_phone.max' => 'O contato deve ter no máximo 14 caracteres'
        ];
    }
}
