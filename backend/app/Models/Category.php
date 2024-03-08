<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'name',
        'code',
        'slug',
        'group_category_id',
        'created_by',
        'updated_by',
    ];

    public function group_category(): BelongsTo
    {
        return $this->belongsTo(GroupCategory::class, 'group_category_id', 'id');
    }
}
