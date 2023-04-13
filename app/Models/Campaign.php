<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
      'org_id',
      'user_id',
      'contact_name',
      'website_url',
      'email',
      'phone',
      'address',
      'city',
      'state',
      'zip',
      'billing_contact',
      'billing_email',
      'billing_address',
      'billing_city',
      'billing_state',
      'billing_zip',
      'billing_phone',
      'can_approve',
      'status'
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

    public function organization() {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function account_exec() {
        return $this->belongsTo(User::class, 'user_id');
    }

	public function proof_sets() {
		return $this->hasMany(ProofSet::class, 'campaign_id');
	}
}
