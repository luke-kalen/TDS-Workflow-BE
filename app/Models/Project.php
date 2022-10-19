<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model {
	use HasFactory;

	protected $fillable = [
		'org_id',
		'title',
		'description',
	];

	public function organization() {
		return $this->belongsTo(Organization::class, 'org_id');
	}

	public function proof_sets() {
		return $this->hasMany(ProofSet::class, 'project_id');
	}
}