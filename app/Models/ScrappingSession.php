<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScrappingSession extends Model
{
    use HasFactory;
    protected $fillable = ['retailer_id',
        'session_date'
    ];

    public function retailer() {
        return $this->belongsTo(Retailer::class);
    }

    public function scrappedData() {
        return $this->hasMany(ScrappedData::class);
    }
}
