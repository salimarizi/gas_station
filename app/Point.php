<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
      'user_id',
      'date',
      'point'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
