<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProofResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request) {
    return [
      'id' => $this->id,
      'proofSetId' => $this->proof_set_id,
      'name' => $this->name,
      'url' => $this->url,
      'status' => $this->status,
      'description' => $this->description
    ];
  }
}