<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
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
            'id' => $this->id,
            'organization' => new OrganizationBasicResource($this->organization),
            'accountExec' => new UserBasicResource($this->account_exec),
            'websiteUrl' => $this->website_url,
            'contactName' => $this->contact_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'billingContact' => $this->billing_contact,
            'billingEmail' => $this->billing_email,
            'billingAddress' => $this->billing_address,
            'billingCity' => $this->billing_city,
            'billingState' => $this->billing_state,
            'billingZip' => $this->billing_zip,
            'billingPhone' => $this->billing_phone,
        ];
    }
}
