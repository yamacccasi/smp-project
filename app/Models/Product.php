<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['title',
        'manufacturer_part_number',
        'pack_size',
        'images',
        'rating_obj',
        'links',
        'user_id'
    ];

    protected $casts = [
        'images' => 'array',
        'rating_obj' => 'json',
        'links' => 'array',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function retailers() {
        return $this->belongsToMany(Retailer::class, 'product_retailer')
            ->withPivot('retailer_url')
            ->withTimestamps();
    }
}
