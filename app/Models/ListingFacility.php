<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingFacility extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'listing_id',
        'facility_id',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
}
