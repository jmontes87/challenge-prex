<?php

namespace App\Models\Services;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class GiphyService extends Model
{
    use HasFactory;

    public function search($query, $limit = 25, $offset = 0)
    {
        try {

            $response = Http::get('https://api.giphy.com/v1/gifs/search', [
                'api_key' => config('app.giphy_api_key'),
                'q' => $query,
                'limit' => $limit,
                'offset' => $offset,
                'rating' => 'g',
                'lang' => 'en',
                'bundle' => 'messaging_non_clips'
            ]);

            if ($response->successful()) {
                return $response->json();
            } else {
                throw new \Exception('Error al comunicarse con la API de Giphy');
            }
        } catch (\Exception $e) {
            throw new \Exception('Error al realizar la solicitud: ' . $e->getMessage());
        }
    }
}
