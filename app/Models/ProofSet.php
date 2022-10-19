<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProofSet extends Model {
	use HasFactory;

	protected $fillable = [
		'project_id',
		'type',
		'name',
		'notes',
        'status',
		'tw_project'
	];

	public function project() {
		return $this->belongsTo(Project::class, 'project_id');
	}

	public function proofs() {
		return $this->hasMany(Proof::class, 'proof_set_id');
	}
}