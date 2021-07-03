<?php
namespace App\Models;
use \Illuminate\Database\Eloquent\Model;

class Chisiamo extends Model{
    protected $table = "personale_medico";
    protected $primaryKey= "id_personale";
    public $incrementing = true;
    protected $fillable = [
        'id_personale',
        'nomecmp',
        'ruolo',
        'ntel',
        'immagine'
    ];


}
