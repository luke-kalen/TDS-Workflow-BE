<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofSet extends Model {
	use HasFactory;

	protected $fillable = [
		'campaign_id',
		'name',
		'notes',
		'type',
    'status'
	];

	public function campaign() {
		return $this->belongsTo(Campaign::class, 'campaign_id');
	}

	public function proofs() {
		return $this->hasMany(Proof::class, 'proof_set_id');
	}
}