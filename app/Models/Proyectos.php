<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
  use HasFactory;

  // $fillable: evitamos asignación masiva.
  protected $fillable = [
    'titulo',
    'descripcion',
  ];
}
