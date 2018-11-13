<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoriaApiTest extends TestCase
{
    use MakeHistoriaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateHistoria()
    {
        $historia = $this->fakeHistoriaData();
        $this->json('POST', '/api/v1/historias', $historia);

        $this->assertApiResponse($historia);
    }

    /**
     * @test
     */
    public function testReadHistoria()
    {
        $historia = $this->makeHistoria();
        $this->json('GET', '/api/v1/historias/'.$historia->id);

        $this->assertApiResponse($historia->toArray());
    }

    /**
     * @test
     */
    public function testUpdateHistoria()
    {
        $historia = $this->makeHistoria();
        $editedHistoria = $this->fakeHistoriaData();

        $this->json('PUT', '/api/v1/historias/'.$historia->id, $editedHistoria);

        $this->assertApiResponse($editedHistoria);
    }

    /**
     * @test
     */
    public function testDeleteHistoria()
    {
        $historia = $this->makeHistoria();
        $this->json('DELETE', '/api/v1/historias/'.$historia->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/historias/'.$historia->id);

        $this->assertResponseStatus(404);
    }
}
