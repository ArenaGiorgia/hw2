<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;


class Tipologia extends Model
{
    //ridefinisco la tabella del mio db
    protected $table = "tipologia";
    protected $primaryKey= "id_tipologia";
    public $incrementing = true;
    protected $fillable = [
        'id_tipologia',
        'nome',
        'img',
        'descrizione'
    ];

   public function cliente(){

            return $this->belongsToMany(Cliente::class,"prenotazioni","id_tipologia","id_cliente","id_tipologia","id_cliente")
            ->withPivot('dataprenotazione');
    }


}


