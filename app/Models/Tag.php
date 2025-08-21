<?php

namespace App\Models;

use App\Models\Diary;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
     protected $fillable = ['name'];

    
    public function diaries()
    {
        return $this->hasMany(Diary::class);
    }
}
