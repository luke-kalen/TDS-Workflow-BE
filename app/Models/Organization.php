<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
	protected $fillable = ['name'];
	use HasFactory;

	public function employees() {
		return $this->hasMany(User::class, 'org_id');
	}

	public function projects() {
		return $this->hasMany(Project::class, 'org_id');
	}
}
