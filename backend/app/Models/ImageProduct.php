<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'image_product';
    protected $fillable = [
        'filename',
        'path',
        'url',
        'type',
    ];

    public function uniqueIds()
    {
        return ['uuid'];
    }
}
