<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;

    protected $table = 'config';
    protected $fillable = ['id', 'name', 'url', 'link', 'content','position', 'status', 'create_at', 'update_at'];
}
