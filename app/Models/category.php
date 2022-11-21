<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $guarded =[
        'id'
    ];

    public function post()
    {
        return $this->hasMany(post::class);
    }

    public function getRouteKeyName() //klo model pingin selalu menggunakan kolom di database selain id
    {
        return 'slug'; //nama kolom
    }
}
