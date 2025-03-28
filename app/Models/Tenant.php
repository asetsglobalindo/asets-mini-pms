<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $table = 'tenants';
    protected $primaryKey = 'tenant_id';
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'busscat_id',
        'tenant_name',
        'phone',
        'email',
        'pic_name',
        'brand_name',
        'address',
    ];

    // Relationship with Company model
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    // Relationship with BusinessCategory model
    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'busscat_id');
    }
}
