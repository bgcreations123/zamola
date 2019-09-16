<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DutyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return [
            'Shipment_id' => $this->id,
            'Order_id' => $this->order_id,
            'Tracer' => $this->order->tracer,
            'Status' => $this->status->name,
            'Staff' => $this->staff->name,
            'Driver' => $this->driver->name,
            'Package' => $this->package->name,
            'Created at' => $this->created_at,
            'Updated at' => $this->updated_at,
            // 'Created at' => (string)$this->created_at->format('d/m/Y'),
            
            // origin
            'sender_name' => $this->order->origin->name,
            'sender_phone' => $this->order->origin->phone,
            'sender_address' => $this->order->origin->address,
            'sender_email' => $this->order->origin->email,
            'sender_location' => $this->order->origin->location,

            // destination
            'receiver_name' => $this->order->destination->name,
            'receiver_phone' => $this->order->destination->phone,
            'receiver_address' => $this->order->destination->address,
            'receiver_email' => $this->order->destination->email,
            'receiver_location' => $this->order->destination->location,
        ];
    }
}
