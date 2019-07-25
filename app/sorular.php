<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sorular extends Model
{
    //
    protected $table='sorular';
    protected $fillable=['title','subject','text'];

}
