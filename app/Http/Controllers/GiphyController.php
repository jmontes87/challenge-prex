<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GiphyRepository;
use App\Http\Resources\GiphySearchResource;
use App\Http\Requests\GiphyStoreRequest;
use App\Http\Requests\GiphySearchRequest;
use App\Http\Resources\GiphyGetByIdResource;
use App\Models\FavoriteGift;
use Illuminate\Support\Facades\Auth;

class GiphyController extends Controller
{
    
    protected $giphyRepository;

    public function __construct(GiphyRepository $giphyRepository)
    {
        $this->giphyRepository = $giphyRepository;
    }

    /**
     * search gif
     *
     * @responseFile storage/responses/giphy.search.json
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
                $bearerToken,
                $request->input('limit', 25),
                $request->input('offset', 0),
            );
    
            return GiphySearchResource::collection($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    /**
     * get gif by ID.
     *
     * @responseFile storage/responses/giphy.show.json
     *
     * @param int $id The ID of the Giphy.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the Giphy data.
     */
    public function show($id)
    {
        try {
            
            $bearerToken = request()->bearerToken();
            $response = $this->giphyRepository->getById($id, $bearerToken);
            return GiphyGetByIdResource::collection($response);
            
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * store favorite gift
     * 
     * @responseFile storage/responses/giphy.store.json
     *
     * @param \App\Http\Requests\GiphyStoreRequest $request The request containing the search criteria.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the search results.
     */
    public function store(GiphyStoreRequest $request)
    {
        try {
            
            $bearerToken = $request->bearerToken();
            $data = $this->giphyRepository->getById($request->id, $bearerToken);
            $response = $this->giphyRepository->store($request, $data);

            return response()->json(['message' => 'GIF almacenado correctamente', 'data' => $response], 200);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
