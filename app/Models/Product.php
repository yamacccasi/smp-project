<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        "title",
        "manufacturer_part_number",
        "pack_size",
        "image"
    ];

    public function scrapedData() {
        return $this->hasMany(ScrapedData::class);
    }
}
