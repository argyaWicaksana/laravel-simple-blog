<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\post;
use App\Models\category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     'name' => 'Argya Wicaksana',
        //     'email' => 'argya@hotmail.com',
        //     'password' => bcrypt(12345),
        //     'slug' => 'argya-wicaksana'
        // ]);

        User::create([
            'name' => 'Daffa Rakan',
            'email' => 'daffa@gmail.com',
            'password' => bcrypt('password'),
            'slug' => 'daffa-rakan'
        ]);

        category::create([
            'name' => 'Politik',
            'slug' => 'politik'
        ]);

        category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi'
        ]);

        category::create([
            'name' => 'Hiburan',
            'slug' => 'hiburan'
        ]);

        // post::create([
        //     'title' => 'Judul Berita Pertama',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        //     Perspiciatis, officia tempore sapiente recusandae id expedita facere, ex facilis fugit voluptate ipsam qui itaque obcaecati praesentium',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis, officia tempore sapiente recusandae id expedita facere, ex facilis fugit voluptate ipsam qui itaque obcaecati praesentium explicabo 
        //     voluptatum aspernatur omnis doloribus enim voluptatibus illum quaerat similique, fuga consectetur. Ipsum, quia consectetur.',
        //     'slug' => 'judul-berita-pertama',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // post::create([
        //     'title' => 'Judul Berita Kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis suscipit error, cum possimus beatae vitae 
        //     harum placeat culpa saepe non, eos, impedit illo porro voluptatibus tempore blanditiis facilis quo est',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis suscipit error, cum possimus beatae vitae harum placeat culpa saepe non, eos, impedit illo porro voluptatibus tempore 
        //     blanditiis facilis quo est minima unde architecto fuga? Dolore nulla debitis reprehenderit a rerum cumque. Adipisci numquam odio harum.',
        //     'slug' => 'judul-berita-kedua',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // post::create([
        //     'title' => 'Judul Berita Ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis suscipit error, cum possimus beatae vitae 
        //     harum placeat culpa saepe non, eos, impedit illo porro voluptatibus tempore blanditiis facilis quo est',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis suscipit error, cum possimus beatae vitae harum placeat culpa saepe non, eos, impedit illo porro voluptatibus tempore 
        //     blanditiis facilis quo est minima unde architecto fuga? Dolore nulla debitis reprehenderit a rerum cumque. Adipisci numquam odio harum.',
        //     'slug' => 'judul-berita-ketiga',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);

        // post::create([
        //     'title' => 'Judul Berita Keempat',
        //     'excerpt' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        //     Perspiciatis, officia tempore sapiente recusandae id expedita facere, ex facilis fugit voluptate ipsam qui itaque obcaecati praesentium',
        //     'body' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis, officia tempore sapiente recusandae id expedita facere, ex facilis fugit voluptate ipsam qui itaque obcaecati praesentium explicabo 
        //     voluptatum aspernatur omnis doloribus enim voluptatibus illum quaerat similique, fuga consectetur. Ipsum, quia consectetur.',
        //     'slug' => 'judul-berita-keempat',
        //     'category_id' => 1,
        //     'user_id' => 2
        // ]);
        post::factory(50)->create();
    }
}
