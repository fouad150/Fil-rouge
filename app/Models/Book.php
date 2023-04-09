<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'description',
        'publication_date',
        'price',
        'quantity',
        'category_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function sales()
    {
        return $this->hasMany(Category::class);
    }
}
