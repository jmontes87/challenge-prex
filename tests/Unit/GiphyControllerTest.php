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
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\FavoriteGift;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

class GiphyControllerTest extends TestCase
{
    use WithFaker;

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
            ->with('funny', 'test-token', 25, 0)
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
        
        $response = $controller->show(1);
        $this->assertInstanceOf(\Illuminate\Http\Resources\Json\AnonymousResourceCollection::class, $response);
    }

    public function testStore()
    {
        // Simula el objeto request con propiedades específicas
        $mockedRequest = Mockery::mock(GiphyStoreRequest::class);
        $mockedRequest->shouldReceive('bearerToken')->andReturn('test-token');
        $mockedRequest->shouldReceive('id')->andReturn(1);
        $mockedRequest->shouldReceive('all')->andReturn(['alias' => 'test', 'id' => 1]);

        // Crear un usuario real usando la fábrica
        $user = User::factory()->create();

        // Mock del facade Auth para devolver el id del usuario real
        Auth::shouldReceive('id')->andReturn($user->id);

        // Establecer user_id en el request usando el id del usuario real
        $mockedRequest->user_id = $user->id;

        // Mock del repositorio y sus métodos
        $mockedRepository = Mockery::mock(GiphyRepository::class);
        $controller = new GiphyController($mockedRepository);

        // Mock del método getById para devolver un GIF ficticio
        $mockedRepository->shouldReceive('getById')
            ->with(1, 'test-token')
            ->andReturn(['data' => ['id' => '3o7527pa7qs9kCG78A']]);

        // Mock del método store para devolver una respuesta exitosa de escritura en la base de datos
        $mockedRepository->shouldReceive('store')
            ->with($mockedRequest, ['data' => ['id' => '3o7527pa7qs9kCG78A']])
            ->andReturn(true);

        // Ejecutar el método store del controlador
        $response = $controller->store($mockedRequest);

        $this->assertNotNull($response);
        $this->assertInstanceOf(JsonResponse::class, $response);

        // Verificar que el contenido de la respuesta es correcto
        $responseData = $response->getData(true);
        $this->assertEquals('GIF almacenado correctamente', $responseData['message']);
        $this->assertTrue($responseData['data']);

    }
    
    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
