<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class commentApiTest extends TestCase
{
    use MakecommentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatecomment()
    {
        $comment = $this->fakecommentData();
        $this->json('POST', '/api/v1/comments', $comment);

        $this->assertApiResponse($comment);
    }

    /**
     * @test
     */
    public function testReadcomment()
    {
        $comment = $this->makecomment();
        $this->json('GET', '/api/v1/comments/'.$comment->id);

        $this->assertApiResponse($comment->toArray());
    }

    /**
     * @test
     */
    public function testUpdatecomment()
    {
        $comment = $this->makecomment();
        $editedcomment = $this->fakecommentData();

        $this->json('PUT', '/api/v1/comments/'.$comment->id, $editedcomment);

        $this->assertApiResponse($editedcomment);
    }

    /**
     * @test
     */
    public function testDeletecomment()
    {
        $comment = $this->makecomment();
        $this->json('DELETE', '/api/v1/comments/'.$comment->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/comments/'.$comment->id);

        $this->assertResponseStatus(404);
    }
}
