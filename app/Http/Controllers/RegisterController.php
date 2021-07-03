<?php

use Illuminate\Routing\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registrazione')->with('csrf_token', csrf_token());
    }

    protected function create()
    {
        $request=request();
        if ($this->controlloErrori($request)===0) {
            $name = $request['nome'];
            $surname = $request['cognome'];
            $data = $request['data_nascita'];
            $nomecmp = $name . " " . $surname;
            $password = $request['password'];
            $password = hash("sha256", $password);
            $password = base64_encode($password);
            $new = Cliente::create([
                'nomecmp' => $nomecmp,
                'cf' => $request['cf'],
                'sesso' => $request['genere'],
                'datanascita' => $data,
                'n_tel' => $request['num_telefonico'],
                'email' => $request['email'],
                'password' => $password
            ]);  if ($new) {
               // Session::put('cf', $new->cf);
                session(['id_cliente'=>$new->id_cliente]);
                return view('home')->with('nomecmp',$nomecmp);
            }
            else {
                return view('registrazione');
            }
        }
        else
            return view('registrazione');
    }


    protected function controlloErrori($req)
    {  //creo un array di vettori
        $error = [];
        //controllo  Cf
        if (!preg_match('/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i', $req['cf'])) {
            $error[] = "cf non valido";

        } else {
            $exist = Cliente::where('cf', $req['cf'])->exists();
            if ($exist) {
                $error[] = "Attenzione!!! Il codice fiscale che hai inserito è già in uso!";
            }
        }
        //controllo password
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/', $req["password"])) {
            $error[] = "Caratteri password insufficienti o sbagliati";
        }
        # CONFERMA PASSWORD
        if (strcmp($req["password"], $req["confirm_password"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        //controllo email
        if (!filter_var($req['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = Cliente::where('email',$req['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }
        //controllo data nascita
        if (!date_parse($req['data_nascita'])) {
            $error[] = "Formato data di nascita non corretto";
        }

        //controllo pat telefonico
        if (!preg_match('/^[0-9]*$/', $req['num_telefonico'])) {
            $error[] = "Ci sono errori nel numero";
        }

        return count($error);

    }

    public function CheckCf(Request $request)
    {
        if (!isset($request['cf'])) exit;
        $exist = Cliente::where('cf',$request['cf'])->exists();
        return ['exists' => $exist];
    }

}
