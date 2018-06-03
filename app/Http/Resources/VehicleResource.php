<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $vehicle = parent::toArray($request);
        $meta['links']=[
            'vehicles_path'=> route('api.vehicles.index'),
            'vehicle_path'=> route('api.vehicles.show', ['id'=>$vehicle['id']]),
            'model_path'=> route('api.models.show', ['id'=>$this->model]),
            'user_path' => route('api.clients.show', ['id' => $this->client])
        ];
        $meta['data']=[
            'model_name' => $this->model->name,
            'brand_name' => $this->model->brand->name,
            'invoices' => null
        ];
        return [
            'data' => $vehicle,
            'meta' => $meta
        ];
    }
}
