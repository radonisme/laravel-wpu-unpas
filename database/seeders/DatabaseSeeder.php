<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Tareq Habbyullah',
            'username' => 'tareqhabbyullah',
            'email' => 'tareqhabbyullah@gmail.com',
            'password' => bcrypt('123456')
        ]);
        
        User::factory(3)->create();
        
        // User::create([
        //     'name' => 'Sandika Galih',
        //     'email' => 'sandikagalih@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Graphic Design',
            'slug' => 'graphic-design',
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        // Post::factory(10)->create();

        // Post::create([
        //     'tittle' => 'Laravel 8',
        //     'slug' => 'laravel-8',
        //     'excerpt' => 'Suscipit dolorem! Deserunt, tempore. Iure adipisci reiciendis laborum dignissimos autem mollitia accusantium',
        //     'body' => 'Suscipit dolorem! Deserunt, tempore. Iure adipisci reiciendis laborum dignissimos autem mollitia accusantium, Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laudantium, perferendis voluptates quaerat suscipit dolorem! Deserunt, tempore. Iure adipisci reiciendis laborum dignissimos autem mollitia accusantium nesciunt accusamus alias, temporibus dolorem!',
        //     'category_id' => 1,
        //     'user_id' => 1 
        // ]);

        // Post::create([
        //     'tittle' => 'Laravel 9',
        //     'slug' => 'laravel-9',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laudantium, perferendis voluptates quaerat suscipit dolorem!',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam laudantium, perferendis voluptates quaerat suscipit dolorem! Deserunt, tempore. Iure adipisci reiciendis laborum dignissimos autem mollitia accusantium nesciunt accusamus alias, temporibus dolorem! Suscipit dolorem! Deserunt, tempore. Iure adipisci reiciendis laborum dignissimos autem mollitia accusantium,',
        //     'category_id' => 2,
        //     'user_id' => 2 
        // ]);
    }
}
