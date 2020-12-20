<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Tag;
use App\User;
class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title' , 'description' , 'content' , 'image' , 'category_id','user_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    public function hasTag($tagId)
    {
        return in_array($tagId , $this->tags->pluck('id')->toArray());

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

