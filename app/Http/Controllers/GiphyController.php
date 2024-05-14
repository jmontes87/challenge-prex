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

    public function search(Request $request)
    {
        try {

            $gifs = $this->giphyService->search(
                $request->input('q'),
                $request->input('limit', 25),
                $request->input('offset', 0)
            );

            return response()->json($gifs);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
