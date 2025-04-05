<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $table = 'documents';

    protected $fillable = [
        'listing',
        'space',
        'number',
        'date',
        'start_date',
        'end_date',
        'type',
        'area_size',
        'size_per_meter',
        'contact_person',
        'contact_number',
        'signature_name',
        'file_url',
    ];
}
