<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class mapController extends Controller
{
    //
    // deals.detail

    public function showMap()
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        return view('deals.detail', compact('apiKey'));
    }
    public function auto()
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        return view('deals.auto', compact('apiKey'));
    }

    public function index(Request $request)
    {
        $input = $request->input('input');
        $location = $request->input('location');
        $radius = $request->input('radius');
        $types = $request->input('types');
        $key ='AIzaSyDQIxPtnNXPMnef3fs9_MKVnuxBSjLLC-w';

        $url = "https://maps.googleapis.com/maps/api/place/autocomplete/json?" .
            "input=$input&" .
            "location=$location&" .
            "radius=$radius&" .
            "types=$types&" .
            "key=$key";

        $response = Http::get($url);

        return response()->json($response->json());
    }

}
