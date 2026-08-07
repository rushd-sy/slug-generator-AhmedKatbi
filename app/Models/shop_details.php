<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shop_details extends Model
{
    /** @use HasFactory<\Database\Factories\ShopDetailsFactory> */
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_name',
        'region_id',
        'location_gps',
    ];
}
