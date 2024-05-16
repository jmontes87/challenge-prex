<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GiphyRepository;
use App\Http\Resources\GiphyResource;
use App\Http\Requests\GiphySearchRequest;

class GiphyController extends Controller
{
    protected $giphyRepository;

    public function __construct(GiphyRepository $giphyRepository)
    {
        $this->giphyRepository = $giphyRepository;
    }

    public function search(GiphySearchRequest $request)
    {

        try {
            $bearerToken = $request->bearerToken();
    
            $response = $this->giphyRepository->search(
                $request->input('query'),
                $request->input('limit', 25),
                $request->input('offset', 0),
                $bearerToken
            );
    
            return GiphyResource::collection($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function searchById($id)
    {
        try {
            
            $bearerToken = request()->bearerToken();
            $gif = $this->giphyRepository->searchById($id, $bearerToken);

            return response()->json($gif);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeById(Request $request, $id)
    {
        try {

            $bearerToken = request()->bearerToken();
            $gif = $this->giphyRepository->searchById($id, $bearerToken);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
