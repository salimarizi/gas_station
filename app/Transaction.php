<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
      'employee_id',
      'outlet_id',
      'price_id',
      'police_number',
      'stars',
      'reviews',
      'liters',
      'discount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }
}
