<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use App\Repositories\AudienceLogRepository;
use Illuminate\Support\Facades\Auth;

class GiphyRepository
{

    protected $audienceLogRepository;

    /**
     * Constructor de GiphyService.
     *
     * @param AudienceLogRepository $audienceLogRepository
     * @return void
     */
    public function __construct(AudienceLogRepository $audienceLogRepository)
    {
        $this->audienceLogRepository = $audienceLogRepository;
    }

    /**
     * Realiza una búsqueda de GIFs en Giphy.
     *
     * @param string $query
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function search($query, $limit = 25, $offset = 0, $bearerToken)
    {
        try {

            $params = [
                'api_key' => config('app.giphy_api_key'),
                'q' => $query,
                'limit' => $limit,
                'offset' => $offset,
                'rating' => 'g',
                'lang' => 'en',
                'bundle' => 'messaging_non_clips'
            ];

            $response = Http::withToken($bearerToken)
                            ->get('https://api.giphy.com/v1/gifs/search', $params);

            $this->audienceLogRepository->log(array(
                'user_id' => Auth::id(),
                'service' => 'giphy/search',
                'request_body' => json_encode($params),
                'response_body' => $response->successful() ? json_encode($response->json(), true) : json_encode($response, true),
                'http_status_code' => $response->status()
            ));

            if ($response->successful()) {
                return $response->json();
            } else {
                return response()->json(['error' => 'Error al comunicarse con la API de Giphy'], $response->status());
            }
        } catch (\Exception $e) {
            throw new \Exception('Error al realizar la solicitud: ' . $e->getMessage());
        }
    }

    /**
     * Busca un GIF por su ID en Giphy.
     *
     * @param string $id
     * @return mixed
     */
    public function getById($id, $bearerToken)
    {
        try {
            
            $params = ['api_key' => config('app.giphy_api_key')];

            $response = Http::withToken($bearerToken)
                            ->get("https://api.giphy.com/v1/gifs/{$id}", $params);

            $this->audienceLogRepository->log(array(
                'user_id' => 1,//auth()->id(),
                'service' => 'giphy/getById',
                'request_body' => json_encode($params),
                'response_body' => $response->successful() ? json_encode($response->json()) : json_decode($response),
                'http_status_code' => $response->status()
            ));

            if ($response->successful()) {
                return $response->json();
            } else {
                return response()->json(['error' => 'Error al comunicarse con la API de Giphy'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al realizar la solicitud: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Almacena un GIF favorito.
     *
     * @return void
     */
    public function storeFavoriteGift($bearerToken)
    {
        dd("");
    }
}
