<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Post extends Model
{

    use Sluggable;
    use SluggableScopeHelpers;
    use HasFactory;

    //
    //
    //

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //
    //
    //

    protected $guarded = [];

    //
    //
    //

    public function user(){

        return $this->belongsTo(User::class);

    }

    //
    //
    //

    public function category(){

        return $this->belongsTo(Category::class);

    }

    //
    //
    //

    public function comments(){

        return $this->hasMany('App\Post');

    }

}
