<?php

use App\Models\Historia;
use App\Repositories\HistoriaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class HistoriaRepositoryTest extends TestCase
{
    use MakeHistoriaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var HistoriaRepository
     */
    protected $historiaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->historiaRepo = App::make(HistoriaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateHistoria()
    {
        $historia = $this->fakeHistoriaData();
        $createdHistoria = $this->historiaRepo->create($historia);
        $createdHistoria = $createdHistoria->toArray();
        $this->assertArrayHasKey('id', $createdHistoria);
        $this->assertNotNull($createdHistoria['id'], 'Created Historia must have id specified');
        $this->assertNotNull(Historia::find($createdHistoria['id']), 'Historia with given id must be in DB');
        $this->assertModelData($historia, $createdHistoria);
    }

    /**
     * @test read
     */
    public function testReadHistoria()
    {
        $historia = $this->makeHistoria();
        $dbHistoria = $this->historiaRepo->find($historia->id);
        $dbHistoria = $dbHistoria->toArray();
        $this->assertModelData($historia->toArray(), $dbHistoria);
    }

    /**
     * @test update
     */
    public function testUpdateHistoria()
    {
        $historia = $this->makeHistoria();
        $fakeHistoria = $this->fakeHistoriaData();
        $updatedHistoria = $this->historiaRepo->update($fakeHistoria, $historia->id);
        $this->assertModelData($fakeHistoria, $updatedHistoria->toArray());
        $dbHistoria = $this->historiaRepo->find($historia->id);
        $this->assertModelData($fakeHistoria, $dbHistoria->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteHistoria()
    {
        $historia = $this->makeHistoria();
        $resp = $this->historiaRepo->delete($historia->id);
        $this->assertTrue($resp);
        $this->assertNull(Historia::find($historia->id), 'Historia should not exist in DB');
    }
}
