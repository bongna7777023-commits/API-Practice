<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name',
        'image',
        'price',
        'stock',
        'is_active',
    ];
    protected $casts = [
        'price'     => 'decimal:2',
        'stock'     => 'integer',
        'is_active' => 'boolean',
    ];
     // Relationship: Product belongs to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
