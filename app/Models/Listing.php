<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'slug',
        'cover',
        'address',
        'longitude',
        'latitude',
        'public',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
