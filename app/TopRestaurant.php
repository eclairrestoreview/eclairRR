<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopRestaurant extends Model
{
    protected $table = "top_restaurant";
    public $timestamps = false;

    protected $fillable = [
        'restaurant_id'
    ];
}
