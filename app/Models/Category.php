<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Harus diperhatikan relasi (postx) akan ikut termigrasi 
    public function postx(){
        return $this->hasMany(Post::class);
    }
}
