<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = [
        'id',
        'id_product',
        'id_user',
        'content',
        'created_at',
        'updated_at'
    ];
}
