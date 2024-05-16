<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GiphyRepository;
use App\Http\Resources\GiphySearchResource;
use App\Http\Requests\GiphySearchRequest;
use App\Http\Resources\GiphyGetByIdResource;

class GiphyController extends Controller
{
    protected $giphyRepository;

    public function __construct(GiphyRepository $giphyRepository)
    {
        $this->giphyRepository = $giphyRepository;
    }


    /**
     * Search for Giphys based on the provided criteria.
     *
     * @param \App\Http\Requests\GiphySearchRequest $request The request containing the search criteria.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the search results.
     */
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
    
            return GiphySearchResource::collection($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    /**
     * Get a Giphy by its ID.
     *
     * @param int $id The ID of the Giphy.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the Giphy data.
     */
    public function getById($id)
    {
        try {
            
            $bearerToken = request()->bearerToken();
            $response = $this->giphyRepository->getById($id, $bearerToken);
            return GiphyGetByIdResource::collection($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function storeById(Request $request, $id)
    {
        try {

            $bearerToken = request()->bearerToken();
            $gif = $this->giphyRepository->getById($id, $bearerToken);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
