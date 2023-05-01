<?php

namespace App\Models;


class Post 
{
    
    private static $blog_post = [
        [ 
        "tittle" => "Belajar Codeigniter",
        "slug" => "belajar-codeigniter",
        "author" => "Sandhika Galih",
        "body" => "Tutorial belajar MVC Framework codeigniter : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio accusamus recusandae eius quae praesentium, hic sapiente illum provident laudantium placeat aperiam? Maxime mollitia repudiandae cumque magnam aperiam, distinctio iure officia, hic harum debitis praesentium illo perspiciatis! Labore minima iure doloribus ipsa hic perferendis ipsam vero alias, reprehenderit ratione nihil cumque architecto! Ducimus illum, reprehenderit ratione incidunt accusamus deserunt ut quia nemo adipisci odit provident blanditiis iusto architecto aspernatur sequi debitis doloremque, laborum minima inventore. Accusantium reiciendis porro nostrum impedit. Officiis, dolorem quaerat. Recusandae itaque sint repudiandae aspernatur veniam nobis eaque. " 
        ],
        [
        "tittle" => "Belajar Laravel",
        "slug" => "belajar-laravel",
        "author" => "Tareq Habbyullah",
        "body" => "Tutorial belajar MVC Framework Laravel : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio accusamus recusandae eius quae praesentium, hic sapiente illum provident laudantium placeat aperiam? Maxime mollitia repudiandae cumque magnam aperiam, distinctio iure officia, hic harum debitis praesentium illo perspiciatis! Labore minima iure doloribus ipsa hic perferendis ipsam vero alias, reprehenderit ratione nihil cumque architecto! Ducimus illum, reprehenderit ratione incidunt accusamus deserunt ut quia nemo adipisci odit provident blanditiis iusto architecto aspernatur sequi debitis doloremque. " 
        ]
    ];

    public static function all(){
        // Properti statis pakai self, bukan $this
        return collect(self::$blog_post);
    }

    public static function single($slug){
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
