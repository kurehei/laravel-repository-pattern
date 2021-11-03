<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;

class PostsController extends Controller
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
        return response()->json($this->post->getPostById((int)$request->id));
    }

    public function store(Request $request) {
        try {
          $this->post->createPostData($request);
          return response()->json(['message' => "保存しました"]);
        } catch (\Exception $e) {
          return response()->json($e->getMessage());
        }
    }
}
