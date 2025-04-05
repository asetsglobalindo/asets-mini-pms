<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Space extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'space_category_id',
        'name',
        'code',
        'space_size',
        'price_type',
        'min_period',
        'price',
        'description',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function category()
    {
        return $this->belongsTo(SpaceCategory::class, 'space_category_id');
    }
}
