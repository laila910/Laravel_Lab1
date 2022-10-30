<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'slug'=>$this->slug,
            'image'=>$this->image,
            'user_info' => new UserResource($this->user),
            // 'city'=>$this->city,
            // 'state'=>$this->state,
            // 'postalCode'=>$this->postal_code,
            // 'invoices'=>InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
