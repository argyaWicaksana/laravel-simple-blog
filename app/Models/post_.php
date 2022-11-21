<?php

namespace App\Models;

class post 
{
    private static $blog_posts= [
    [
        'title' => 'Berita 1',
        'slug' => 'berita-1',
        'author' => 'Dani',
        'content' => '
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Delectus enim nulla, corrupti deserunt officia eius eos nam laborum impedit sit.
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
        Error dolorem obcaecati tempore laboriosam a nam, minima at explicabo labore facere.
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. 
        Doloremque eum cupiditate saepe autem eaque ad fugit perferendis facilis rem quae?
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam, porro! Ipsum accusamus 
        laboriosam possimus nihil suscipit quia error dolorem culpa.'
        
    ],
    [
        'title' => 'Berita 2',
        'slug' => 'berita-2',
        'author' => 'Doni',
        'content' => '
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit delectus qui vitae alias 
        nisi fugiat deleniti et est tempore, architecto dignissimos exercitationem repellendus 
        voluptatem consequatur dolores soluta. Rem aperiam ad quibusdam? Laborum vero debitis 
        modi amet sunt mollitia aspernatur voluptatem iste officia rem iure at sit quaerat 
        minima voluptates sed alias impedit autem, quos pariatur eaque fugiat iusto, porro ipsa! 
        Voluptatum cumque excepturi velit exercitationem quae id asperiores modi ex, ullam dolor 
        tenetur, voluptatem sequi ipsam accusamus. Dolor, eum nobis?'
    ]];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $news_contents = static::all();
        return $news_contents->firstWhere('slug', $slug); //refer ke blog_post[i]['slug']=$slug
        // intinya, cari blog_post[i]['slug'] yang pertama dengan kondisi 'slug'=$slug
    }
}
