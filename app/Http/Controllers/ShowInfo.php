<?php

use Illuminate\Routing\Controller;
use App\Models\Cliente;
use App\Models\Sedi;
use App\Models\Referti;
use App\Models\Chisiamo;
use App\Models\Esito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ShowInfo extends Controller
{
    public function indexSedi()
    {
        return view('sedi');
    }

    public function ShowSedi()
    {
        $sedi = Sedi::all();
        return $sedi;
    }

    public function indexChisiamo()
    {
        return view('chisiamo');
    }

    public function ShowChiSiamo()
    {
        $chisiamo = Chisiamo::all();
        return $chisiamo;
    }

    public function indexReferti()
    {
        return view('referti');
    }

    public function ShowReferti()
    {
        $list = array();
        $cliente = Cliente::find(session('id_cliente'));
        $info = Referti::where('id_cliente', $cliente->id_cliente)->get();
        foreach ($info as $inf) {
            $esito = Esito::where('prestazione', $inf->id_prest)->get();
            foreach ($esito as $es) {
                array_push($list, [
                    'tipologia' => $inf->tipologia,
                    'personale_medico' => $inf->personale_medico,
                    'data_effettuata' => $es->dataeff,
                    'descrizione' => $es->descrizione
                ]);
            }

        }
        return response()->json($list);


    }


}
