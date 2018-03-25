<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = "restaurant";
    protected $primaryKey = "restaurant_id";
    public $timestamps = true;


    protected $fillable = [
        'restaurant_id',
        'name',
        'address',
        'desc',
        'city',
        'phone_number',
        'price_bottom',
        'price_top',
        'img_url'
    ];
}
