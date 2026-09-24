<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_code',
        'name',
        'brand',
        'model',
        'processor',
        'ram',
        'storage',
        'status',
        'location',
    ];
}