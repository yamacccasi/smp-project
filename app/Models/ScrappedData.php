<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ScrappingSession;

class ScrappedData extends Model
{
    use HasFactory;
    protected $fillable = ['title',
        'description',
        'price',
        'images',
        'rating',
        'avg_rating',
        'session_id',
        'product_id',
        'retailer_id'
    ];

    protected $casts = [
        'images' => 'array',
        'rating' => 'json',
    ];

    public function session() {
        return $this->belongsTo(ScrappingSession::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function retailer() {
        return $this->belongsTo(Retailer::class);
    }
}
