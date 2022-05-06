<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'amount',
        'price',
        'image',
        'description',
        'category_id',
    ];
    public function categoryProduct(){
        
        return $this->belongsTo(Category::class);
    }
}
