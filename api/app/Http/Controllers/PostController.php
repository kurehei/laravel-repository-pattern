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
        var_dump($this->Post->getAll());
    }
}
