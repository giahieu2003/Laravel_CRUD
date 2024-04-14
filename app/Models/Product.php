<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'image',
        'price',
        'status',
        'description',
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
