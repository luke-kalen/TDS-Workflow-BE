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
    'status',
		'can_approve'
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
			'can_approve' => 'boolean',
	];

	public function canApprove(): bool
	{
			return $this->can_approve;
	}

	public function campaign() {
		return $this->belongsTo(Campaign::class, 'campaign_id');
	}

	public function proofs() {
		return $this->hasMany(Proof::class, 'proof_set_id');
	}
}