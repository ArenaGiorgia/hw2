<?php

namespace App\Models;
use \Illuminate\Database\Eloquent\Model;


class Cliente extends Model
{
    //ridefinisco la tabella del mio db
    protected $table = "cliente";
    protected $primaryKey= "id_cliente";
    public $incrementing = true;
    public $timestamps= false;
    protected $fillable = [
        'nomecmp',
        'cf',
        'sesso',
        'datanascita',
        'n_tel',
        'email',
        'password'
    ];
    protected $cast = [
        'datanascita' => 'date'
    ];

    protected $hidden = [
        'password'
    ];


    public function tipologia(){
        return $this->belongsToMany(Tipologia::class,"prenotazioni","id_cliente","id_tipologia","id_cliente","id_tipologia")
            ->withPivot('dataprenotazione');
    }


}
