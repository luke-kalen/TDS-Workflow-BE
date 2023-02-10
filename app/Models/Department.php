<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model {
    use HasFactory;
    protected $fillable = [
      'name',
      'org_id'
    ];

    public function employees() {
      return $this->hasMany(User::class, 'dept_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }
}
