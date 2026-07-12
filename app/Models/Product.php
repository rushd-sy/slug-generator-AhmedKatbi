<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'number_of_pieces',
        'size_or_weight',
        'price',
        'stock_quantity',
        'image_path',
    ];
}
