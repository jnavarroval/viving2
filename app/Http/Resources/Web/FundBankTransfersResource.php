<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;

class FundBankTransfersResource extends JsonResource
{
    public static $wrap = null;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $fund = $this->relationLoaded('fund') ? $this->whenLoaded('fund') : null;
        return [
            "id" =>  $this->id,
            "bank_account_id" =>  $this->bank_account_id,
            "fund_id" =>  $this->fund_id,
            "fund" => $fund ? $fund : null,
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
