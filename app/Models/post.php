<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    // protected $fillable = [ //properti yg boleh diisi (bisa pakai create(contoh di bawah) di tinker)
    //     'title',
    //     'excerpt',
    //     'body',
    //     'slug'
    // ];
    protected $guarded =['id']; //kebalikannya fillable

    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {
        // $filters['search'] ?? false artinya, klo $filters['search'] gk ada isinya, return false, klo ada isinya, return $filters['search']
        // $query->when($filters['search'] ?? false, function($query, $search){
        //     return $query->where('title', 'like', '%' . $search . '%')
        //     ->orWhere('body', 'like', '%' . $search . '%');
        // });

        // $query->when($filters['search'] ?? false, function($query, $search) {
        //    return $query->where(function($query) use ($search) {
        //         $query->where('title', 'like', '%' . $search . '%')
        //                     ->orWhere('body', 'like', '%' . $search . '%');
        //     });
        // });

        $query->when($filters['search'] ?? false, fn($query, $search)=>
            $query->where(fn($query)=>
                $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category)=>
            $query->whereHas('category', fn($query)=> // whereHas, maksudnya, query ini punya relationship apa? (disini punya category(line 57) sama author(line 62))
                $query->where('slug', $category) //slug merujuk ke kolom pada database
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author)=> //author di baris ini merujuk ke request['author'] pada controller
            $query->whereHas('author', fn($query)=> //author pada wherehas merujuk ke line 47
                $query->where('slug', $author)
            )
        );
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName() //klo model pingin selalu menggunakan kolom di database selain id
    {
        return 'slug'; //nama kolom
    }
}
