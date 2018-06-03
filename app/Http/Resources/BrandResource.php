<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $models= null;
        foreach($this->models as $key => $model) $models[] = route('api.models.show', $model['id']);
        $meta = [
            'models' =>  $models,
        ];
        return [
            'data' => $data,
            'meta' => $meta
        ];
    }
}
