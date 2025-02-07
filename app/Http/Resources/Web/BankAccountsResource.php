<?php

namespace App\Http\Resources\Web;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountsResource extends JsonResource
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
        return [
            "id" =>  $this->id,
            "name" =>  $this->name,
            "description" =>  $this->description,
            "account_number" =>  $this->account_number,
            "account_holder_name" =>  $this->account_holder_name,
            "iban_number" =>  $this->iban_number,
            "bic_swift" =>  $this->bic_swift,
            "sort_code" =>  $this->sort_code,
            "is_active" =>  $this->is_active,
            "created_at" =>  $this->created_at,
            "updated_at" =>  $this->updated_at,
        ];
    }
}
