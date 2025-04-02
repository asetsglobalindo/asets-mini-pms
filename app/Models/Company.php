<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    // protected $primaryKey = 'company_id';
    protected $primaryKey = 'id';
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
