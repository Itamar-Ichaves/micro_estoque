<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Configura a tabela
    protected $table = 'categories';

    // Habilita timestamps
    public $timestamps = true;

    // Chave primária como UUID
    protected $keyType = 'string';
    public $incrementing = false;

    // Colunas que podem ser atribuídas em massa
    protected $fillable = [
        'nome',
        'description',
        'token_company'
    ];

    // Definir os nomes das colunas de timestamps se necessário
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}