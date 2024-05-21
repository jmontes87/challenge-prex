<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AudienceLogGetAllResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = parent::toArray($request);

        if (isset($data['request_body'])) {
            $data['request_body'] = json_decode(base64_decode($data['request_body']), true);
        }

        if (isset($data['response_body'])) {
            $data['response_body'] = json_decode(base64_decode($data['response_body']), true);
        }

        return $data;
    }
}
