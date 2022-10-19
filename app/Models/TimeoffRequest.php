<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeoffRequest extends Model {
	use HasFactory;

	protected $fillable = [
		'user_id',
		'dates',
		'review_id',
		'status',
		'comment'
	];

	public function user() {
		return $this->belongsTo(User::class, 'user_id');
	}

	public function dates() {
		return $this->hasMany(RequestsDate::class, 'request_id');
	}

	public function reviews() {
		return $this->hasMany(RequestsReview::class, 'request_id');
	}
}
