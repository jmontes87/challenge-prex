<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AudienceLogRepository;

class LogRequests
{
    protected $audienceLogRepository;

    public function __construct(AudienceLogRepository $audienceLogRepository)
    {
        $this->audienceLogRepository = $audienceLogRepository;
    }

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $responseBody = $response->getContent();

        $this->audienceLogRepository->log([
            'user_id' => Auth::id(),
            'service' => $request->path(),
            'request_body' => json_encode($request->all()),
            'response_body' => json_encode($responseBody, true),
            'http_status_code' => $response->status(),
            'ip_address' => $request->ip(),
        ]);

        return $response;
    }
}

