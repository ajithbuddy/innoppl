<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ["name","price","sku","description","images"];
    public $timestamps = true;
    protected $casts = [
        'images' => 'json' // This tells Laravel to automatically cast the 'images' column to a JSON array
    ];
}
