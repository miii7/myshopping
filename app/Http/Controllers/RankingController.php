<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RankingController extends Controller
{
    public function index()
    {
        //itemインスタンスのプロパティとしてreallyWantUsersを追加
        $query = Item::withCount('reallyWantUsers');

        //副問い合わせで、ReallyWantしているユーザの人数が0より大きいものについて、降順に10件取得
        $items = Item::fromSub($query, 'alias')
            ->where('really_want_users_count', '>', 0)
            ->orderBy('really_want_users_count', 'desc')
            ->take(10)
            ->get();
     
         return view('ranking.reallyWantRanking', [
            'items' => $items,
        ]);
    }
    
  
}
