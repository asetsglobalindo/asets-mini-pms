<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    use HasFactory;

    protected $table = 'bussiness_category';
    protected $primaryKey = 'busscat_id';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'user_id',
        'company_id',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relationship with Company model
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
