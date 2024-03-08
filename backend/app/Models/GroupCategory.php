<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GroupCategory extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'code',
    'slug',
    'created_by',
    'updated_by',
  ];


}
