<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'full_name' => $this->full_name,
            'role'=>$this->role->role,
            'comments_count' =>$this->comments->count(),
        ];
    }
}
