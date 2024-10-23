<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LocationApiTest extends TestCase
{
    /**
     * Test para verificar el acceso sin API Key.
     */
    public function test_access_without_api_key()
    {
        // Llamar al endpoint sin la clave API
        $response = $this->getJson('/api/locations');

        // Verificar que retorne un error de autorización
        $response->assertStatus(401)
                 ->assertJson([
                     'error' => 'Unauthorized',
                 ]);
    }

    /**
     * Test para verificar el acceso con API Key incorrecta.
     */
    public function test_access_with_wrong_api_key()
    {
        // Llamar al endpoint con una clave API incorrecta
        $response = $this->getJson('/api/locations', ['x-api-key' => 'wrong-api-key']);

        // Verificar que retorne un error de autorización
        $response->assertStatus(401)
                 ->assertJson([
                     'error' => 'Unauthorized',
                 ]);
    }

    /**
     * Test para verificar el acceso con API Key correcta.
     */
    public function test_access_with_valid_api_key()
    {
        // Simular el valor correcto de la API Key
        $apiKey = config('app.api_key');

        // Llamar al endpoint con la clave API correcta
        $response = $this->getJson('/api/locations', ['x-api-key' => $apiKey]);

        // Verificar que la respuesta sea 200 OK
        $response->assertStatus(200);

        // Verificar que la respuesta tenga una estructura JSON válida
        $response->assertJsonStructure([
            '*' => ['code', 'name', 'image', 'creationDate']
        ]);
    }
}
