<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;
    protected $fillable = ['name',
        'currency',
        'logo',
        'link'
    ];

    public function products() {
        return $this->belongsToMany(Product::class, 'product_retailer')
            ->withPivot('retailer_url')
            ->withTimestamps();
    }

    public function users() {
        return $this->belongsToMany(User::class, 'user_retailer')
            ->withPivot('is_active')
            ->withTimestamps();
    }
}
