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
            
            $bearerToken = $request->bearerToken();

            $gifs = $this->giphyService->searchText(
                $request->input('query'),
                $request->input('limit', 25),
                $request->input('offset', 0),
                $bearerToken
            );

            return response()->json($gifs);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function searchById($id)
    {
        try {
            
            $bearerToken = request()->bearerToken();
            $gif = $this->giphyService->searchById($id, $bearerToken);

            return response()->json($gif);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeById(Request $request, $id)
    {
        try {

            $bearerToken = request()->bearerToken();
            $gif = $this->giphyService->searchById($id, $bearerToken);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
