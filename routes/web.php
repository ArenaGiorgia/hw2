<?php

use App\Models\PrenotazioniController;
use App\Models\Tipologia;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Builder;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Models\Referti;
use App\Models\Cliente;
use App\Models\Esito;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});
//QUESTE SONO LE ROUTE DELLA HOME
Route::get('/home', "HomeController@index")->name("home");
//QUESTE SONO LE ROUTE DEL LOGIN
Route::get('/login', "LoginController@login")->name("login");
Route::post('/login/checkLogin', 'LoginController@checkLogin')->name("check");
Route::post('/login/CheckCred', 'LoginController@CheckCred')->name("CheckCred");
Route::get('/logout', 'LoginController@logout')->name("logout");
//QUESTE SONO LE ROUTE DELLA REGISTRAZIONE
Route::get('/registrazione', "RegisterController@index")->name("registrazione");
Route::post('/registrazione/CheckCf', "RegisterController@CheckCf")->name("CheckCf");
Route::post('/registrazione', "RegisterController@create");
//QUESTA è LA RUOTE DELLE PRENOTAZIONI
Route::get('/prenotazioni', [PrenotazioniController::class, "index"])->name("prenotazioni");
Route::get('/prenotazioni/ElencoPrenotazione',[PrenotazioniController::class,"ElencoPrenotazioni"])->name("elenco");
Route::get('/prenotazioni/addPrenotazioni',[PrenotazioniController::class, "addPrenotazioni"])->name("addPrenotazioni");
Route::get('/prenotazioni/indexErr', [PrenotazioniController::class, "indexErr"])->name("prenotazioniErr");
//QUESTA è LA RUOTE DELLE SEDI
Route::get('/sedi', "ShowInfo@indexSedi")->name("sedi");
Route::get('/sedi/ShowSedi',"ShowInfo@ShowSedi")->name("ShowSedi");
//QUESTA è LA RUOTE DELLE personale
Route::get('/chisiamo', "ShowInfo@indexChisiamo")->name("chisiamo");
Route::get('/chisiamo/Chisiamo', "ShowInfo@ShowChisiamo")->name("Showchisiamo");
//QUESTA è LA RUOTE DEGLI ESAMI
Route::get('/esami', "EsamiController@indexEsami")->name("esami");
Route::get('/esami/ShowEsami', "EsamiController@ShowEsami")->name("ShowEsami");
//QUESTA è LA RUOTE DELLE API
Route::get('/covid', "ApiController@index")->name("covid");
Route::get('/covid/NewsApi', "ApiController@NewsApi")->name("NewsApi");
Route::get('/covid/Vaccovid', "ApiController@Vaccovid")->name("Vaccovid");
//QUESTA è LA RUOTE DELLE personale
Route::get('/referti', "ShowInfo@indexReferti")->name("referti");
Route::get('/referti/ShowReferti', "ShowInfo@ShowReferti")->name("ShowReferti");


//Route::get('/info',function(){
//    return phpinfo();
//});

/*Route::get('/test', function () {
    $password = "Sabrina11!";
    $password = hash("sha256", $password);
    echo "senza hash:" . $password;
    echo "</br>";
    $password = base64_encode($password);
    echo "con base 64: " . $password;
});*/

Route::get('/test', function () {
   /* return Esito::addselect(

    );*/
    $ref=Referti::all();
    return $ref;
});
Route::get('/info', function () {
    $result=Cliente::find(session('cf'))->cliente()->get();
    return response()->json($result);
});
