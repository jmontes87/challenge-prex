<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services\AudienceLogService;

class AudienceLogController extends Controller
{

    protected $audienceLogService;

    public function __construct(AudienceLogService $audienceLogService)
    {
        $this->audienceLogService = $audienceLogService;
    }

    public function getAll(){
        try {
            
            $bearerToken = request()->bearerToken();
            $gif = $this->audienceLogService->getAll($bearerToken);

            return response()->json($gif);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
