<?php

namespace App;

use phpDocumentor\Reflection\DocBlock\Tag;
use Illuminate\Database\Eloquent\Model;

class sorular extends Model
{
    //
    protected $table='sorular';
    protected $fillable=['title','subject','text','label'];


    public function tags()
    {
        return $this->belongsToMany('app\sorular','sorular_tags','user_id','tags_id')->withTimestamps();
    }

}
