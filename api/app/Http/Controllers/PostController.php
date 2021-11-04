<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;

class PostController extends Controller
{
    /**
     * @var $Post
     */
    protected $post;

    /**
     *
     * @param PostDataAccess $PostDataAccess
     */
    public function __construct(PostDataAccess $postDataAccess)
    {
        $this->post = $postDataAccess;
    }

    public function index() {
        return $this->post->getAll();
    }

    public function show(Request $request) {
        return $this->post->getPostById((int)$request->id);
    }

    public function store(Request $request) {
        try {
          $this->post->createPostData($request);
        } catch (\Exception $e) {
          return response()->json($e->getMessage());
        }
        return response()->json(['message' => "保存しました"]);
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
