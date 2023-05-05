<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGalery extends Model
{
    use HasFactory;
    protected $table = 'images_galery';
    protected $fillable = ['id', 'url', 'link', 'status', 'create_at', 'update_at'];
}
