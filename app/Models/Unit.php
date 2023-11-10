<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'token_company'];

    public function units()
    {
        return $this->belongsToMany(Product::class);
    }
}
