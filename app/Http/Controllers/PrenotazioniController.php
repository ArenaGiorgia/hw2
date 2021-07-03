<?php

namespace App\Models;

use App\Models\Cliente;
use Illuminate\Support\Arr;
use Illuminate\Routing\Controller;
use App\Models\Tipologia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class PrenotazioniController extends Controller
{

    public function index()
    {
        return view("prenotazioni");
    }
    public function indexErr(Request $request)
    {
        return view("err_prenotazioni")->with('errori',$request->all());
    }
    public function ElencoPrenotazioni()
    {
        $result = Cliente::find(session('id_cliente'))->tipologia()->get();
        return response()->json($result);

    }

    public function addPrenotazioni()
    {
        $errori=array();
        $i=0;
        $request = request();
        $json = $request->json;
        $json = base64_decode($json);
        $json = json_decode($json, true);
        foreach ($json as $js) {
            if(Cliente::find(session('id_cliente'))->tipologia()->wherePivot('id_tipologia', $js['id_tipologia'])->exists()) {
                $prenotazioni = Cliente::find(session('id_cliente'))->tipologia()->wherePivot('id_tipologia', $js["id_tipologia"])->get();
                foreach ($prenotazioni as $prenotazione) {
                    $data = $prenotazione->pivot->dataprenotazione;
                    $diff = date_diff(now(), date_create($data));
                    $giorni = $diff->d;
                    if ($giorni >= 30) {
                        Cliente::find(session('id_cliente'))->tipologia()->attach($js['id_tipologia']);
                    }
                    else{

                    $errori['key'.$i]=$js['nome'];
                     $i++;
                    }
                }


            }
            else{
                Cliente::find(session('id_cliente'))->tipologia()->attach($js['id_tipologia']);
            }

        }
        if($errori!==[]) return json_encode(route('prenotazioniErr',$errori));

        return json_encode(route ('prenotazioni'));

    }


}

