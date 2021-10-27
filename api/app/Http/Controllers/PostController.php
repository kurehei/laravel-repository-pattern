<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Post\PostDataAccessRepositoryInterface AS PostDataAccess;

class PostController extends Controller
{
    /**
     * @var $Post
     */
    protected $Post;

    /**
     *
     * @param PostDataAccess $PostDataAccess
     */
    public function __construct(PostDataAccess $PostDataAccess)
    {
        $this->Post = $PostDataAccess;
    }

    public function index() {
        return response()->json($this->Post->getAll());
    }

    public function show(Request $request) {

        return response()->json($this->Post->getPostById((int)$request->id));//$this->Post->getPostById((int)$request->id);
    }
}
