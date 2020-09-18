<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{

    protected $guarded = [];

    public function profileImage(){
        return ($this->image) ? '/storage/' . $this->image : '/storage/uploads/imgs/default-avatar.jpg';
    }
    /**
     * user .
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

}
