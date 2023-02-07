<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
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
            'response_text' => $this->response_text,
            'username' => $this->username,
            'created_at' => $this->created_at,
            'image' =>  $this->image?asset("storage/{$this->image}"):NULL,
        ];
    }
}
