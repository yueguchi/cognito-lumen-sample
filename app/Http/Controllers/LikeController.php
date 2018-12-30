<?php

namespace App\Http\Controllers;

use App\Http\FormRequests\LikeRequest;
use App\Services\Like\LikeService;

/**
 * Class LikeController
 *
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /** @var LikeService */
    private $likeService;

    /**
     * LikeController constructor.
     *
     * @param LikeService $likeService
     */
    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }
    
    /**
     * [PATCH] Like Increment
     *
     * @param LikeRequest $request
     * @return mixed Array
     */
    public function increment(LikeRequest $request)
    {
        // TODO なぜかget('uuid') or input('uuid')で取得できない...
        return response($this->likeService->change($request->all()['uuid'], 1), 200);
    }
    
    /**
     * [PATCH] Like Decrement
     *
     * @param LikeRequest $request
     * @return mixed Array
     */
    public function decrement(LikeRequest $request)
    {
        return response($this->likeService->change($request->all()['uuid'], -1), 200);
    }
}
