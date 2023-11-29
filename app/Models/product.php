<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'id_category',
        'name',
        'quantity',
        'description',
        'import_price',
        'export_price',
        'Is_Active',
        'image',
    ];
}
