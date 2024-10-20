<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRetailer extends Model
{
    use HasFactory;

    protected $table = 'product_retailer';
    protected $fillable = [
        'product_id',
        'retailer_id',
        'retailer_url',
    ];

    public $timestamps = false;
}
