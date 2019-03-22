<?php

namespace App\Http\Controllers;

use App\Services\Giphy;
use GPH\Model\Gif;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Giphy $giphy)
    {
        $gifs  = $giphy->popular()->getData();
        $title = 'Popular GIFs';

        $gifs = collect($gifs)->transform(function (Gif $gif) {
            return [
                'preview' => $gif->getImages()->getPreviewGif()->getUrl(),
            ];
        });

        return view('index', compact('gifs', 'title'));
    }
}
