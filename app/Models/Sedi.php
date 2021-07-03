<?php


namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Sedi extends Model
{
    protected $table = "laboratorio";
    protected $primaryKey= "id_laboratorio";
    protected $fillable = [
       'id_laboratorio',
        'nome',
        'sede',
        'immlab',
    ];
}

