<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'token' => $this->resource->accessToken,
            'expires_at' => $this->resource->token->expires_at->format('Y-m-d H:i:s')
        ];
    }
}
