<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\Giphy;
use GPH\Model\Gif;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class SearchController extends Controller
{
    private $giphy;

    public function __construct(Giphy $giphy)
    {
        $this->giphy = $giphy;
    }

    private function performSearch(string $search)
    {
        $results = $this->giphy->setTtl(60)->search($search)->getData();

        return collect($results)->transform(function (Gif $gif) {
            return [
                'preview' => $gif->getImages()->getPreviewGif()->getUrl(),
            ];
        });
    }

    public function search(SearchRequest $request): JsonResponse
    {
        $gifs = $this->performSearch($request->get('search'));

        return new JsonResponse($gifs);
    }

    public function searchResults(string $search): View
    {
        $gifs = $this->performSearch($search);

        return view('index', compact('gifs', 'search'));
    }
}
