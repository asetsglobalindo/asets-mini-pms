<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BussinessStatus extends Model
{
    use HasFactory;

    protected $table = 'bussiness_status';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'company_id',
        'color',
        'name',
    ];

    // Relationship with Company model
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
