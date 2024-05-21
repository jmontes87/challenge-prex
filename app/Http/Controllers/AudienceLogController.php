<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\AudienceLogRepository;
use App\Http\Resources\AudienceLogGetAllResource;

class AudienceLogController extends Controller
{

    protected $audienceLogRepository;

    public function __construct(AudienceLogRepository $audienceLogRepository)
    {
        $this->audienceLogRepository = $audienceLogRepository;
    }

    /**
     * get logs
     * 
     * @return \Illuminate\Http\JsonResponse The JSON response containing the search results.
     */
    public function getAll(){
        try {
            
            $bearerToken = request()->bearerToken();
            $gif = $this->audienceLogRepository->getAll($bearerToken);
            return AudienceLogGetAllResource::collection($gif);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
