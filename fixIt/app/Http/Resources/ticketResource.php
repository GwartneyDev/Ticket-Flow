<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ticketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            [
        'id' => $this->id,
        'body' => $this-> body,
        'slug' => $this->slug, 
        'assigned' => $this->assigned, 
        'requested'=> $this->requested,
        'priorty' => $this->priorty,
        'status'=> $this->status,
        'created_at'=> $this->created_at,
            ]
        ];
    }
}
