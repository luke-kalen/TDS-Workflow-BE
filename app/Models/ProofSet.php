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
		'can_activate'
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
			'can_activate' => 'boolean',
	];

	public function canActivate(): bool
	{
			return $this->can_activate;
	}

	public function campaign() {
		return $this->belongsTo(Campaign::class, 'campaign_id');
	}

	public function proofs() {
		return $this->hasMany(Proof::class, 'proof_set_id');
	}
}