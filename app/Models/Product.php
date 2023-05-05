<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $fillable = ['id', 'pro_name', 'images', 'catPro_id', 'price', 'summary', 'description', 'status', 'order', 'meta_keyword', 'meta_description', 'user_id', 'date_public', 'view_count', 'create_at', 'update_at'];
}
