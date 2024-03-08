<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCm extends Model
{
    use HasFactory;
    protected $table = 'product_cm';
    protected $fillable = [
        'product_id',
        'content_management'
    ];
}
