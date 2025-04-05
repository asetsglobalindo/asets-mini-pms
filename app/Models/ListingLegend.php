<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingLegend extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'legend_id',
        'name',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function legend()
    {
        return $this->belongsTo(Legend::class);
    }
}
