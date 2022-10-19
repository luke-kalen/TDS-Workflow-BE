<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsReview extends Model {
	use HasFactory;

	protected $fillable = [
		'request_id',
		'status',
		'time_stamp',
		'comments'
	];

	public function request() {
		return $this->belongsTo(TimeoffRequest::class, 'request_id');
	}
}
