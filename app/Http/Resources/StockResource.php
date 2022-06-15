<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'stock' => $this->content,
        ];
    }

}
