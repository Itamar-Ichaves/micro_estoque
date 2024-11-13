<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'description', 
        'token_company',
        'sigla',
        'emitente'
    ];

    public $timestamps = true; // Certifique-se de que os timestamps estão habilitados
}
