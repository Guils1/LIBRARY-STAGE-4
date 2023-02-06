<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Authors extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'photo',
        'biography',
    ];

    public function rules() {
        return [
            'name' => 'required|unique:authors,name,'.$this->id.'|min:3',
            'photo' => 'required|file|mimes:png,jpeg,jpg',
            'biography' => 'required'
        ];
    }

    public function feedback() {
        return [
            'required' => 'O campo :attribute é obrigatório',
            'file' => 'O campo :attribute precisa ser um arquivo',
            'name.unique' => 'O nome do autor já existe',
            'name.min' => 'O nome deve ter no minímo 3 caracteres',
        ];
    }

    public function books() {
        // N-1 - Um autor pode ter mais de um livro
        return $this->hasMany('App\Models\Books');
    }
}