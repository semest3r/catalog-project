<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'subscribers';
    protected $fillable = [
        'email',
        'status'
    ];
    
    public function uniqueIds()
    {
        return ['uuid'];
    }
}
