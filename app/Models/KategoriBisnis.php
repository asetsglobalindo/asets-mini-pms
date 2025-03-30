<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBisnis extends Model
{
    public $table = 'bussiness_category';

    public $fillable = [
        'company_id',
        'name'
    ];

    public $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
