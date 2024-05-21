<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\GiphyController;
use App\Repositories\GiphyRepository;
use Illuminate\Http\Request;
use App\Http\Resources\GiphyGetByIdResource;
use App\Http\Requests\GiphySearchRequest;
use App\Http\Requests\GiphyStoreRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\FavoriteGift;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class GiphyControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testSearch()
    {
        $repositoryMock = Mockery::mock(GiphyRepository::class);
        $controller = new GiphyController($repositoryMock);

        $requestMock = Mockery::mock(GiphySearchRequest::class);
        $requestMock->shouldReceive('bearerToken')->andReturn('test-token');
        $requestMock->shouldReceive('input')->with('query')->andReturn('funny');
        $requestMock->shouldReceive('input')->with('limit', 25)->andReturn(25);
        $requestMock->shouldReceive('input')->with('offset', 0)->andReturn(0);

        $repositoryMock->shouldReceive('search')
            ->with('funny', 25, 0, 'test-token')
            ->andReturn(collect([['id' => '1', 'title' => 'Funny GIF']]));

        $response = $controller->search($requestMock);
        $this->assertInstanceOf(\Illuminate\Http\Resources\Json\AnonymousResourceCollection::class, $response);
    }

    public function testGetById()
    {
        $repositoryMock = Mockery::mock(GiphyRepository::class);
        $controller = new GiphyController($repositoryMock);

        $repositoryMock->shouldReceive('getById')
            ->with(1, 'test-token')
            ->andReturn(collect([['id' => '1', 'title' => 'Funny GIF']]));

        $requestMock = Mockery::mock(Request::class)->makePartial();
        $requestMock->shouldReceive('bearerToken')->andReturn('test-token');

        // Reemplazar la instancia de request en el contenedor de la aplicación
        $this->app->instance('request', $requestMock);
        
        $response = $controller->getById(1);
        $this->assertInstanceOf(\Illuminate\Http\Resources\Json\AnonymousResourceCollection::class, $response);
    }


    public function testStoreById()
    {
        // Simular el objeto Request
        $requestMock = Mockery::mock(GiphyStoreRequest::class);
        $requestMock->shouldReceive('validated')->andReturn([
            'alias' => 'test',
            'id' => 1, // Simular que el ID proviene del formulario
        ]);
        $requestMock->shouldReceive('bearerToken')->andReturn('test-token');

        // Mockear el repositorio
        $repositoryMock = Mockery::mock(GiphyRepository::class);
        $controller = new GiphyController($repositoryMock);

        // Mockear el método getById en el repositorio
        $repositoryMock->shouldReceive('getById')
            ->with(1, 'test-token')
            ->andReturn(['data' => ['id' => '3o7527pa7qs9kCG78A']]);

        // Llamar al método storeById
        $response = $controller->storeById($requestMock);

        // Verificar que la respuesta no es nula y es una instancia de JsonResponse
        $this->assertNotNull($response);
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Verificar que los datos se guardaron en la base de datos
        $this->assertDatabaseHas('favorite_gift', [
            'gif_id' => '3o7527pa7qs9kCG78A',
            'user_id' => Auth::id(), // Utiliza Auth::id() para obtener el ID del usuario autenticado
            'alias' => 'test'
        ]);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
