<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductInCategoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_id' => $this->category_id,
            'sku' => $this->sku,
            'name' => $this->name,
            'description' => $this->description,
            'purchase_price' => $this->purchase_price,
            'selling_price' => $this->selling_price,
            'stock' => $this->stock,
            'minimum_stock' => $this->minimum_stock,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
