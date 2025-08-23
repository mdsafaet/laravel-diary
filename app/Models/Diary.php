<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $fillable = [

        'user_id',
        'category_id',
        'tag_id',
        'title',
        'date',
        'content'   

    ] ;


    public function user(){
        return $this->belongsTo(User::class);
    }

     public function category(){
        return $this->belongsTo(Category::class);
     }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }



}
