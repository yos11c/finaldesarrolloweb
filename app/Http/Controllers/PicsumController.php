<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PicsumController extends Controller
{
    public function getImages()
    {
        $response = Http::get('https://picsum.photos/v2/list');
        return response()->json($response->json());
    }
}
