<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Legend extends Model
{
    use HasFactory;

    protected $table = 'legends';

    protected $fillable = [
        'company_id',
        'name',
        'slug',
        'icon',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($legend) {
            $legend->slug = Str::slug($legend->name);
        });
    }
}
