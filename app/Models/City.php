<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
      'name',
      'lon',
      'lat'
    ];

    public function user() {
      return $this->hasMany(User::class);
    }
}
