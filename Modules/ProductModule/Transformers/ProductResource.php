<?php

namespace Modules\ProductModule\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
//        return 
//            'id' => $this->id,
//            'name' => $this->name,
//            'description' => $this->description,
//            'price' => $this->price,
//            'category_id' => $this->category_id,
//            'created_at' => $this->created_at,
//            'updated_at' => $this->updated_at
//        ];

        return parent::toArray($request);


    }

}


