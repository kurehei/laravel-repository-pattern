<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tags\TagServiceInterface;

class TagsController extends Controller
{

    protected $tagService;

    /**
     *
     * @param TagServiceInterface $tagServiceInterface
     */
    public function __construct(TagServiceInterface $tagServiceInterface) {
        $this->tagService = $tagServiceInterface;
    }

    public function store(Request $request) {
        return $this->tagService->saveTag($request->tags);
    }
}
