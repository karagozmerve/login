<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tags extends Model
{
    //
    protected $table='tags';
    protected $fillable=['label'];

    public function sorular()
    {
        return $this->belongsToMany('App\sorular','sorular_tags','sorular_id');
    }
}
