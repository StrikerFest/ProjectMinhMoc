<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    use HasFactory;
    protected $table = 'address';
    protected $fillable = [
        'id_customer',
        'province',
        'district',
        'ward',
        'address',
        'status',
        'created_at',
        'updated_at'
    ];
}
