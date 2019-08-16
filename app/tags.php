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
        return $this->belongsToMany('app\tags','sorular_tags');
    }
}
