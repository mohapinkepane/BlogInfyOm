<?php

use App\Models\comment;
use App\Repositories\commentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class commentRepositoryTest extends TestCase
{
    use MakecommentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var commentRepository
     */
    protected $commentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->commentRepo = App::make(commentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatecomment()
    {
        $comment = $this->fakecommentData();
        $createdcomment = $this->commentRepo->create($comment);
        $createdcomment = $createdcomment->toArray();
        $this->assertArrayHasKey('id', $createdcomment);
        $this->assertNotNull($createdcomment['id'], 'Created comment must have id specified');
        $this->assertNotNull(comment::find($createdcomment['id']), 'comment with given id must be in DB');
        $this->assertModelData($comment, $createdcomment);
    }

    /**
     * @test read
     */
    public function testReadcomment()
    {
        $comment = $this->makecomment();
        $dbcomment = $this->commentRepo->find($comment->id);
        $dbcomment = $dbcomment->toArray();
        $this->assertModelData($comment->toArray(), $dbcomment);
    }

    /**
     * @test update
     */
    public function testUpdatecomment()
    {
        $comment = $this->makecomment();
        $fakecomment = $this->fakecommentData();
        $updatedcomment = $this->commentRepo->update($fakecomment, $comment->id);
        $this->assertModelData($fakecomment, $updatedcomment->toArray());
        $dbcomment = $this->commentRepo->find($comment->id);
        $this->assertModelData($fakecomment, $dbcomment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletecomment()
    {
        $comment = $this->makecomment();
        $resp = $this->commentRepo->delete($comment->id);
        $this->assertTrue($resp);
        $this->assertNull(comment::find($comment->id), 'comment should not exist in DB');
    }
}
