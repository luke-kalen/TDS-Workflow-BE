<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model {
	use HasFactory;

	protected $fillable = [
		'proof_set_id',
		'name',
		'url',
		'status',
		'description'
	];

	public function proof_set() {
		return $this->belongsTo(ProofSet::class, 'proof_set_id');
	}
}