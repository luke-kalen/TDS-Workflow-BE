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

	public function campaigns() {
			return $this->hasMany(Campaign::class, 'org_id');
	}

	public function departments() {
		return $this->hasMany(Department::class, 'org_id');
	}
}
