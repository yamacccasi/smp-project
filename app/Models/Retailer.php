<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'link',
        'currency',
        'logo'
    ];

    public function scrapedData() {
        return $this->hasMany(ScrapedData::class);
}
}
