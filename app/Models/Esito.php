<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Esito extends Model
{
    protected $table="esito";
    protected $primaryKey= "id_esito";
    public $incrementing = true;
    public $timestamps= false;

     protected $fillable= [
         'id_esito',
         'descrizione',
         'dataeff',
         'prestazione',
     ];


}
