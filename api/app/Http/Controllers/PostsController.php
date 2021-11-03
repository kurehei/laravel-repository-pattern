<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
