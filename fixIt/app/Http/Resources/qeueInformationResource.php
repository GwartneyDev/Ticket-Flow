<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class qeueInformationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {   
       return[
        'id' =>$this->id,
        'assigned' =>$this->assigned, 
        'status' => $this->status,
        'requested' =>$this->requested,
        'created_at' =>$this->created_at,
        'slug' => $this->slug
       ];
    }
}
