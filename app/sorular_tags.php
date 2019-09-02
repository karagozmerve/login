<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sorular_tags extends Model
{
    //
    protected $table='sorular_tags';
    protected $fillable=['id','sorular_id','tags_id'];
    protected $primaryKey='id';

    public function tag()
    {
        return $this->belongsTo('App\tags','tags_id','id');
    }
}
