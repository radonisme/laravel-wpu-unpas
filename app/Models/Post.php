<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory, Sluggable;

    // Untuk mengizinkan mass assingment atau pengisian melalui seeder kita perlu memberitahu field mana yang fillable
    // protected $fillable = ['tittle', 'excert', 'body'];

    // Kebalikan fillable :
    protected $guarded = ['id'];

    // eager with :
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {
    // if(request('cari')){
    //     $posts->where('tittle', 'like', '%' . request('cari') . '%' )
    //     ->orWhere('body', 'like', '%' . request('cari') . '%' ); ATAU :
    
    // when dalam laravel digunakan untuk mengganti isset
    $query->when($filters['cari'] ?? false, function($query, $search){
    return $query->where('tittle', 'like', '%' . $search . '%' )->orWhere('body', 'like', '%' . $search . '%' );
    });

    $query->when($filters['category'] ?? false, function($query, $category){
        return $query->whereHas('category', function($query) use ($category) {
            $query->where('slug', $category);
        });
    });
    
    $query->when($filters['author'] ?? false, function($query, $author){
        return $query->whereHas('author', function($query) use ($author) {
            $query->where('username', $author);
        });
    });
    }

    // Method baru untuk menghubungkan dengan tabel lain
    public function category()
    {
        // Jika memiliki lebih dari satu maka -hasMany- jika hanya satu makan belongsTo
        return $this->belongsTo(Category::class);
    }

    public function author(){

        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
