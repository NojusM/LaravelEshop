<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function type()
    {
        return $this->belongsTo(Type::class)->withDefault();
    }

    protected $table = 'products';
    protected $fillable = ['title', 'description','quantity', 'price', 'animeimg', 'category_id', 'type_id'];
}
