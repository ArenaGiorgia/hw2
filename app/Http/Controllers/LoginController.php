<?php

use Illuminate\Routing\Controller;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    public function login()
    {

        if (session('id_cliente') !== null) {
            return redirect("home");
        } else {
            return view('login')
                ->with('csrf_token', csrf_token());
        }
    }

    public function checkLogin()
    {
        $request = request();
        $password = hash("sha256",$request['password']);
        $password = base64_encode($password);
        $cliente = Cliente::where('cf', $request['cf'])->first();
        if (strcmp($cliente->password,$password)===0 ){
               // Session::put('cf', $cliente['cf']);
                session(['id_cliente'=>$cliente->id_cliente]);
                return redirect('home');
        } else {

            return redirect('login');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect('login');
    }

    public function CheckCred(Request $request)
    {
        if (!isset($request['cf'])||!isset($request['password'])) exit;
        $password = $request['password'];
        $password = hash("sha256", $password);
        $password = base64_encode($password);
        $exist = Cliente::where('cf',$request['cf'])->where('password',$password)->exists();
        return ['exists' => $exist];
    }
}

