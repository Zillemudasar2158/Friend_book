<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apicontroller extends Controller
{
    public function index()
    {
    	// $response=Http::get('https://datausa.io/api/data?drilldowns=Nation&measures=Population');
    	// $data=$response->json();
    	// return view('api',['data'=>$data['data']]);

    	$response=http::get('https://official-joke-api.appspot.com/random_joke');
    	$data=$response->json();
    	return view('api',['data'=>$data]);
    }
}
