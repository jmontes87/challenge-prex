<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GiphyGetByIdResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $data = $this->resource;
        
        return [
            'type' => $data['type'] ?? null,
            'id' => $data['id'] ?? null,
            'url' => $data['url'] ?? null,
            'slug' => $data['slug'] ?? null,
            'title' => $data['title'] ?? null,
            'is_sticker' => $data['is_sticker'] ?? null,
            'images' => $data['images'] ?? null,
            'alt_text' => $data['alt_text'] ?? null,
        ];
        
        return $processedData;
    }
    
}
