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
      'proof_set' => $this->proof_set,
      'description' => $this->description,
      'status' => $this->status,
      'name' => $this->name,
      'url' => $this->url
    ];
  }
}