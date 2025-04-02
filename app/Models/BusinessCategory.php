<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $table = 'bussiness_category';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'company_id',
    ];

    // Relationship with Company model
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
