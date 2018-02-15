<?php

use Faker\Factory as Faker;
use App\Models\comment;
use App\Repositories\commentRepository;

trait MakecommentTrait
{
    /**
     * Create fake instance of comment and save it in database
     *
     * @param array $commentFields
     * @return comment
     */
    public function makecomment($commentFields = [])
    {
        /** @var commentRepository $commentRepo */
        $commentRepo = App::make(commentRepository::class);
        $theme = $this->fakecommentData($commentFields);
        return $commentRepo->create($theme);
    }

    /**
     * Get fake instance of comment
     *
     * @param array $commentFields
     * @return comment
     */
    public function fakecomment($commentFields = [])
    {
        return new comment($this->fakecommentData($commentFields));
    }

    /**
     * Get fake data of comment
     *
     * @param array $postFields
     * @return array
     */
    public function fakecommentData($commentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'body' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $commentFields);
    }
}
