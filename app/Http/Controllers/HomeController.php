<?php

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Cliente;

class HomeController extends Controller
{
    public function index()
    {
        $cliente = session('id_cliente');

       if (!isset($cliente))
            return view('home');

        $nome = Cliente::find($cliente);
        return view("home")->with('nomecmp', $nome->nomecmp);
    }

}

