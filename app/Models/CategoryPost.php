<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';
    protected $fillable = ['id', 'cat_name', 'status', 'meta_keyword', 'meta_description', 'create_at', 'update_at'];
}
