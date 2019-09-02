<?php

namespace App;
use App\tags;
use Illuminate\Database\Eloquent\Model;
use App\sorular_tags;
class sorular extends Model
{
    //
    protected $table='sorular';
    protected $fillable=['title','subject','text','label'];


    public function tags()
    {
        return $this->belongsToMany('App\tags','sorular_tags','tags_id');
    }

}
