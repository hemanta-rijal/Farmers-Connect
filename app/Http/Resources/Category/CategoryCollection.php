<?php

namespace App\Http\Resources\Category;

use App\Http\Resources\Farm\FarmListResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        return [
            parent::toArray($request),

        ];
    }
}
