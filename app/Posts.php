<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = [];
    //user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
