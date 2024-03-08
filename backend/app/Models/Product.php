<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Product extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'code',
        'slug',
        'description',
        'image_id',
        'created_by',
        'updated_by',

    ];

    public function uniqueIds()
    {
        return ['uuid'];
    }

    public function category(): HasManyThrough
    {
        return $this->hasManyThrough(Category::class, ProductCategory::class, 'product_id', 'id', 'id', 'category_id');
    }
    public function image_product(): BelongsTo
    {
        return $this->belongsTo(ImageProduct::class, 'image_id', 'id');
    }
}
