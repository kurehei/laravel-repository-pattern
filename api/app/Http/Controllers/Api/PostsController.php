<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;
use App\Services\Posts\PostServiceInterface;

class PostsController extends Controller
{
    /**
     * @var $Post
     */
    protected $post;

    /**
     *
     * @param PostServiceInterface $postService
     */
    protected $postService;

    /**
     *
     * @param PostDataAccess $PostDataAccess
     */
    public function __construct(
        PostDataAccess $postDataAccess,
        PostServiceInterface $postService)
    {
        $this->post = $postDataAccess;
        $this->postService = $postService;
    }

    public function index() {
        return $this->post->getAll();
    }

    public function show(Request $request) {
        return $this->post->getPostById((int)$request->id);
    }

    public function store(Request $request) {
        return response()->json(['message' => $this->postService->savePost($request)]);
    }

    public function update(Request $request) {
        try {
          $this->post->updatePostData($request);
        } catch (\Exception $e) {
          return response()->json($e->getMessage());
        }
        return response()->json(['message' => "更新しました"]);
    }

    public function delete(Request $request) {
        try {
          $this->post->deletePostData($request);
        } catch (\Exception $e) {
          return response()->json($e->getMessage());
        }
        return response()->json(['message' => "削除しました"]);
    }
}
