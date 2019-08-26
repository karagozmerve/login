<?php

namespace App;
use App\tags;
use Illuminate\Database\Eloquent\Model;

class sorular extends Model
{
    //
    protected $table='sorular';
    protected $fillable=['title','subject','text','label'];


    public function tags()
    {
        return $this->belongsToMany('tags');
    }

}
