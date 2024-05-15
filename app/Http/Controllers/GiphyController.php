<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\GiphyService;

class GiphyController extends Controller
{
    protected $giphyService;

    public function __construct(GiphyService $giphyService)
    {
        $this->giphyService = $giphyService;
    }

    public function searchText(Request $request)
    {
        try {
            $gifs = $this->giphyService->searchText(
                $request->input('query'),
                $request->input('limit', 25),
                $request->input('offset', 0)
            );

            return response()->json($gifs);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function searchById($id)
    {
        try {
            $gif = $this->giphyService->searchById($id);
            return response()->json($gif);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeById(Request $request)
    {
        try {

            $gif = $this->giphyService->storeFavoriteGift(
                $request->input('gif_id'),
                $request->input('alias')
            );
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
