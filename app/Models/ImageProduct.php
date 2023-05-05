<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduct extends Model
{
    use HasFactory;

    protected $table = 'images_product';
    protected $fillable = ['id', 'url', 'pro_id', 'status', 'create_at', 'update_at'];
}
