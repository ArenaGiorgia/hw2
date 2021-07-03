<?php


namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Referti extends Model
{
    protected $table="vista1";
    protected $fillable = [
        'id_prest',
        'id_tip',
        'tipologia',
        'data_effettuata',
        'id_cliente',
        'nome_cliente',
        'id_pers',
        'personale_medico',
        'id_lab',
        'nome_lab'
    ];


}


