<?php

namespace App\Models;
use Illuminate\Support\Arr;
class Post 
{
    public static function all ()
    {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1', // perbaikan di sini
                'title' => 'Judul Artikel 1',
                'author' => 'Syarif Sanad',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ad ipsam sapiente exercitationem repellendus illum distinctio numquam facilis. Ut distinctio consectetur delectus assumenda molestias officiis qui harum nulla quae sapiente?'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2', // perbaikan di sini
                'title' => 'Judul Artikel 2',
                'author' => 'Syarif Sanad',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe ad ipsam sapiente exercitationem repellendus illum distinctio numquam facilis. Ut distinctio consectetur delectus assumenda molestias officiis qui harum nulla quae sapiente?'
            ]
            ];
    }

    public static function find($slug):array
    {
  

    $post =  Arr::first(static::all(), fn ($post) =>  $post['slug'] == $slug);
    if (! $post) {
        abort(404);
    }

    return $post;
    }
    }
