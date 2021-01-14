<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
      'user_id',
      'name',
      'type',
      'police_number'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
