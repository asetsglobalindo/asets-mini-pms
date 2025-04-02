<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    // protected $primaryKey = 'company_id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
    ];

    // Relationship with BusinessCategory model
    public function businessCategories()
    {
        return $this->hasMany(BusinessCategory::class, 'company_id');
    }
}
