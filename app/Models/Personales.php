<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personales extends Model
{
    // use HasFactory;
    protected $table = "personales";
    public $fillable = [
        'nombre',
        'apellido',
        'texto',
        'celular',
        'created_at',
        'updated_at',
    ];
}
