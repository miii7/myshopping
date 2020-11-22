<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

     public function loadRelationshipCounts()
    {
        //ReallyWantとWantそれぞれの件数を取得
        $this->loadCount(['reallyWants','nomalWants']);
    }
    
    public function wants()
    {
        return $this->belongsToMany(Item::class, 'wants', 'user_id', 'item_id')->withPivot('memo')->withTimestamps();
    }
    
    
    public function reallyWants()
    {
        return $this->wants()->where('want_kind','reallyWant');
    }
    
    public function nomalWants()
    {
        return $this->wants()->where('want_kind','want');
    }
    
 
    public function want($itemId,$want_kind)
    {
       // すでにWant登録しているかの確認
        $exist = $this->is_want_id($itemId);
        
        if ($exist) {
            // すでにWant登録していれば何もしない
            return false;
        } else {
            // 未登録であればほしい登録する
            $this->wants()->attach($itemId,['want_kind'=>$want_kind]);
            return true;
        }
    }
    
    public function notwant($itemId)
    {
        // すでにWant登録しているかの確認
        $exist = $this->is_want_id($itemId);
        
        if ($exist) {
            // すでにWant登録していればほしいを外す
            $this->wants()->detach($itemId);
            return true;
        } else {
            // 未登録であれば何もしない
            return false;
        }
    }
    
    public function is_want($itemCode)
    {
        return $this->wants()->where('code', $itemCode)->exists();
    }

     public function is_want_id($itemId)
    {
      // wantsのitem_idカラムの中に $itemIdのものが存在するか
      return $this->wants()->where('item_id', $itemId)->exists();
    }



}
