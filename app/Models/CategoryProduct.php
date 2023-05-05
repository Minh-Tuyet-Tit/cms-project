<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use HasFactory;

    protected $table = 'categories_product';
    protected $fillable = ['id', 'cat_name', 'images', 'status', 'meta_keyword', 'meta_description', 'create_at', 'update_at'];
}
