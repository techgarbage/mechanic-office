<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Vehicle;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $client = parent::toArray($request);
        $meta['cars']=null;
        foreach($this->vehicles as $key => $vehicle) $meta['cars']['vehicle_'.$vehicle['id']] = route('api.vehicles.show', ['id' => $vehicle['id']]);

        $meta['links']=[
            'users_path'=> route('api.clients.index'),
            'user_path' => route('api.clients.show', ['id'=>$client['id']])
        ];
        return [
            'data' => $client,
            'meta' => $meta,
        ];
    }
}
