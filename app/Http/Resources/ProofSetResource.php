<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProofSetResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request) {
    return [
      'id' => $this->id,
      'campaignId' => $this->campaign_id,
      'name' => $this->name,
      'notes' => $this->notes,
      'type' => $this->type,
      'status' => $this->status,
      // 'proofs' => ProofResource::collection($this->proofs)
    ];
  }
}