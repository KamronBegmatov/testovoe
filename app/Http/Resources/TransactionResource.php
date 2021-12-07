<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'from' => $this->from_id,
            'to' => $this->to_id,
            'amount' => $this->amount,
            'status' => $this->status,
            'timeStamp' => $this->created_at,
            'service_id' => $this->service_id,
        ];
    }
}
