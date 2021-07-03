<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Cliente;

class ApiController extends Controller
{
    public function index()
    {
        return view('covid');
    }

    public function NewsApi()
    {
        return Http::get(env('NEWS_ENDPOINT'), [
                'q' => 'coronavirus, medicina',
                'from' => now(),
                'language' => 'it',
                'pageSize' => 8,
                'sortBy' => 'popularity',
                'apikey' => env('NEWS_KEY')]
        );
    }

    public function Vaccovid()
    {
        $response = Http::withHeaders([
            'x-rapidapi-host' => 'vaccovid-coronavirus-vaccine-and-treatment-tracker.p.rapidapi.com',
            'x-rapidapi-key' => '096005b443msh9c637cfcb5b8a56p11abccjsncfe2bc870b65'
        ])->get('https://vaccovid-coronavirus-vaccine-and-treatment-tracker.p.rapidapi.com/api/npm-covid-data/europe');


        if ($response->failed()) abort(500);
        return $response->json();
    }
}
