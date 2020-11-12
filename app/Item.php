<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'code', 'item_name','image','price',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'wants', 'item_id', 'user_id')->withTimestamps();
    }

     public function reallyWantUser()
    {
        return $this->users()->where('want_kind','reallyWant');
    }


}
