<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $post = $this[0];
        return [
            'id' => $post->getId(),
            'name' => $post->getName(),
            'email' => $post->getDetail(),
            'tags' => self::expandTagList($this["tags"])
        ];
    }

    protected static function expandTagList(Collection $tagList): Collection {
        return $tagList->map(function($tag) {
            return [
                'id' => $tag->getId(),
                'name' => $tag->getName(),
                'postId' => $tag->getPostId()
            ];
        });
    }
}
