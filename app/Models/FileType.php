<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileType extends Model
{
    use HasFactory;
    protected $table = 'file_types';
    protected $fillable = ['id', 'file_extention', 'status', 'create_at', 'update_at'];
}
