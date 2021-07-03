<?php
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Cliente;
use App\Models\Tipologia;

class EsamiController extends Controller{

    public function indexEsami(){
        return view('esami');
    }
    public function ShowEsami()
    {
        $tipologia = Tipologia::all();
        return $tipologia;

    }

}
