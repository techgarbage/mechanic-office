<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModelResource extends JsonResource
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
        $vehicles= null;
        foreach($this->vehicles as $key => $vehicle) $vehicles[] = route('api.vehicles.show', $vehicle['id']);

        $meta['links'] = [
            'links' => [
                'models_path'=> route('api.models.index'),
                'model_path'=> route('api.models.show', ['id'=>$data['id']]),
                'brand_path'=> route('api.brands.index', ['id'=>$data['brand_id']])
            ],
            'vehicles' => $vehicles

        ];

        //$meta['brand'] = 'url';
        return [
            'data' => $data,
            'meta' => $meta
        ];
    }
}
