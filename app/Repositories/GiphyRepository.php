<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\FavoriteGift;

class GiphyRepository
{

    /**
     * Realiza una búsqueda de GIFs en Giphy.
     *
     * @param string $query
     * @param string $bearerToken
     * @param int $limit
     * @param int $offset
     * @return mixed
     * @throws \Exception
     */
    public function search($query, $bearerToken, $limit = 25, $offset = 0)
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
     * @param string $bearerToken
     * @return mixed
     */
    public function getById($id, $bearerToken)
    {
        try {
            $params = ['api_key' => config('app.giphy_api_key')];

            $response = Http::withToken($bearerToken)
                            ->get("https://api.giphy.com/v1/gifs/{$id}", $params);

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
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($request, $data)
    {
        try {
            $favorite = FavoriteGift::create([
                'gif_id' => $data['data']['id'],
                'alias' => $request->alias,
                'user_id' => Auth::id(),
            ]);
            return response()->json($favorite, 201);

        } catch (\Throwable $th) {
            return response()->json(['error' => 'Error al realizar la solicitud: ' . $th->getMessage()], 500);
        }
    }
}
