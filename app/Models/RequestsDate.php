<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestsDate extends Model {
	use HasFactory;

	protected $fillable = [
		'request_id',
		'request_date',
		'paid'
	];

	public function request() {
		return $this->belongsTo(TimeoffRequest::class, 'request_id');
	}
}
