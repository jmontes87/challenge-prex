<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GiphySearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        $data = $this->resource;

        $processedData = collect($data)->map(function ($item) {
            return [
                'type' => $item['type'] ?? null,
                'id' => $item['id'] ?? null,
                'url' => $item['url'] ?? null,
                'slug' => $item['slug'] ?? null,
                'title' => $item['title'] ?? null,
                'is_sticker' => $item['is_sticker'] ?? null,
                'images' => $item['images'] ?? null,
                'alt_text' => $item['alt_text'] ?? null,
            ];
        })->toArray();
        
        return $processedData;
    }
}
