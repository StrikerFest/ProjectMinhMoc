<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'phone',
        'province',
        'district',
        'ward',
        'address',
        'Total_selling_price',
        'Status',
        'payment_method',
        'created_at',
        'updated_at'
    ];
}
