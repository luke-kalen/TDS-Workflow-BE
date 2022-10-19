<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array
   */
  public function toArray($request) {
    return [
      'id' => $this->id,
      'user' => $this->user,
      'status' => $this->status,
      'comment' => $this->comment,
      'dates' => RequestsDateResource::collection($this->dates),
      'reviews' => RequestsReviewResource::collection($this->reviews)
    ];
  }
}