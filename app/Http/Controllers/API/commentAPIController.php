<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecommentAPIRequest;
use App\Http\Requests\API\UpdatecommentAPIRequest;
use App\Models\comment;
use App\Repositories\commentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class commentController
 * @package App\Http\Controllers\API
 */

class commentAPIController extends AppBaseController
{
    /** @var  commentRepository */
    private $commentRepository;

    public function __construct(commentRepository $commentRepo)
    {
        $this->commentRepository = $commentRepo;
    }

    /**
     * Display a listing of the comment.
     * GET|HEAD /comments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->commentRepository->pushCriteria(new RequestCriteria($request));
        $this->commentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $comments = $this->commentRepository->all();

        return $this->sendResponse($comments->toArray(), 'Comments retrieved successfully');
    }

    /**
     * Store a newly created comment in storage.
     * POST /comments
     *
     * @param CreatecommentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecommentAPIRequest $request)
    {
        $input = $request->all();

        $comments = $this->commentRepository->create($input);

        return $this->sendResponse($comments->toArray(), 'Comment saved successfully');
    }

    /**
     * Display the specified comment.
     * GET|HEAD /comments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var comment $comment */
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        return $this->sendResponse($comment->toArray(), 'Comment retrieved successfully');
    }

    /**
     * Update the specified comment in storage.
     * PUT/PATCH /comments/{id}
     *
     * @param  int $id
     * @param UpdatecommentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecommentAPIRequest $request)
    {
        $input = $request->all();

        /** @var comment $comment */
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        $comment = $this->commentRepository->update($input, $id);

        return $this->sendResponse($comment->toArray(), 'comment updated successfully');
    }

    /**
     * Remove the specified comment from storage.
     * DELETE /comments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var comment $comment */
        $comment = $this->commentRepository->findWithoutFail($id);

        if (empty($comment)) {
            return $this->sendError('Comment not found');
        }

        $comment->delete();

        return $this->sendResponse($id, 'Comment deleted successfully');
    }
}
