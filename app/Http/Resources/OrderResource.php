<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => $this->user->name,
            'Status' => $this->status->name,
            'Tracer' => $this->tracer,
            'Shipment_Category' => $this->shipment_category->name,
            'Payment Method' => $this->payment_method->name,
            'Quantity' => $this->quantity,
            'Weight' => $this->weight,
            'Description' => $this->description,
            'Length' => $this->length,
            'Width' => $this->width,
            'Height' => $this->height,
            // 'Created at' => (string)$this->created_at->format('d/m/Y'),
            'Created at' => $this->created_at,
        ];
    }
}
