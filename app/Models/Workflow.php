<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_name',
        'url',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'zip',
        'billing_email',
        'billing_phone',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_zip',
        'billing_contact',
        'user_id'
    ];

    public function user_id() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
