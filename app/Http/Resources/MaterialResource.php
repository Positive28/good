<?php

namespace App\Http\Resources;
use App\Http\Resources\MaterialResource;

use Illuminate\Http\Resources\Json\JsonResource;

class MaterialResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'warehouse_id' => $this->id,
            'material_name' => $this->material_name,
            // 'qty' => $this->qty,
            'quantity' => $this->whenPivotLoaded('product_materials', function () {
                return $this->pivot->quantity;
            }),
            'price' => $this->price,
            'warehouses' => $this->warehouses,

        ];
    }
}
