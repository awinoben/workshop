<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TruckRecord extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //paginator only accepts json data
        return parent::toArray($request);

        // return [
        //     'id' => $this->id,  
        //     'driver_name' => $this->driver_name,
        //     'driver_phone' => $this->driver_phone,
        //     'company' => $this->company,
        //     'owner_name' => $this->owner_name,
        //     'owner_email' => $this->owner_email,
        //     'truck_model' => $this->truck_model,
        //     'truck_registration' => $this->truck_registration,
        //     'truck_chassis_number' => $this->truck_chassis_number,
        //     'engine_number' => $this->engine_number,
        //     'mileage' => $this->mileage
        //   ];
    }
}
