<?php

namespace Tests\Unit;

use Tests\TestCase;
use Mockery;
use App\Http\Controllers\GiphyController;
use App\Repositories\GiphyRepository;
use Illuminate\Http\Request;
use App\Http\Resources\GiphyGetByIdResource;
use App\Http\Requests\GiphySearchRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\FavoriteGift;
use App\Models\User;

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
        // Crear un usuario de prueba
        $user = User::factory()->create(['id' => 1, 'name' => 'test', 'email' => 'test@test.com', 'password' => bcrypt('123456')]);

        $repositoryMock = Mockery::mock(GiphyRepository::class);
        $controller = new GiphyController($repositoryMock);

        // Mockear el método getById en el repositorio
        $repositoryMock->shouldReceive('getById')
            ->with(1, 'test-token')
            ->andReturn(['data' => ['id' => '1']]);

        // Mockear el Request
        $requestMock = Mockery::mock(Request::class)->makePartial();
        $requestMock->shouldReceive('bearerToken')->andReturn('test-token');
        $requestMock->id = 1;

        // Reemplazar la instancia de request en el contenedor de la aplicación
        $this->app->instance('request', $requestMock);

        // Llamar al método storeById
        $response = $controller->storeById($requestMock);

        // Verificar que la respuesta no es nula y es una instancia de JsonResponse
        $this->assertNotNull($response);
        $this->assertInstanceOf(\Illuminate\Http\JsonResponse::class, $response);

        // Verificar que los datos se guardaron en la base de datos
        $this->assertDatabaseHas('favorite_gifts', [
            'gif_id' => '1',
            'user_id' => $user->id,
            'alias' => 'test'
        ]);
    }


    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
