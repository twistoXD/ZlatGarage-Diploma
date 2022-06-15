<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user' => $this->user->full_name,
            'content' => $this->content
        ];
    }
}
