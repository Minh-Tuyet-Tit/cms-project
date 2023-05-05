<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesSlideShow extends Model
{
    use HasFactory;
    protected $table = 'images_slideshow';
    protected $fillable = ['id', 'url', 'link_pro', 'text_head', 'text_content', 'status', 'create_at', 'update_at'];

}
