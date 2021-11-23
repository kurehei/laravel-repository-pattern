<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
        // $tags = $this["tags"];
        return [
            'id' => $post->getId(),
            'name' => $post->getName(),
            'email' => $post->getDetail(),
            'tags' => $this->expandTagList($this["tags"])
        ];
    }

    public function expandTagList(array $tagList): array {
        return array_map(function($tag) {
            return [
                'id' => $tag->getId(),
                'name' => $tag->getName(),
                'postId' => $tag->getPostId()
            ];
        }, $tagList);
    }
}
