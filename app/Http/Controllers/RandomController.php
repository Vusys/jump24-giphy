<?php

namespace App\Http\Controllers;

use App\Gif;
use App\Services\Giphy;

class RandomController extends Controller
{
    public function index(Giphy $giphy)
    {
        $gifs  = Gif::query()->inRandomOrder()->limit(25)->get();
        $title = 'Random GIFs';

        $gifs = collect($gifs)->transform(function (Gif $gif) {
            return ['preview' => $gif->image_url];
        });

        return view('index', compact('gifs', 'title'));
    }
}
