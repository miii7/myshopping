<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'user_id', 'code', 'item_url','item_name','image','price',
    ];

    public function wantUsers()
    {
        return $this->belongsToMany(User::class, 'wants', 'item_id', 'user_id')->withTimestamps();
    }

     public function reallyWantUsers()
    {
        // Really Wantしている人を指定
        return $this->wantUsers()->where('want_kind','reallyWant');
    }

}
