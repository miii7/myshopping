<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RankingController extends Controller
{
    public function index()
    {
        
        $query = Item::withCount('reallyWantUsers');

        $items = Item::fromSub($query, 'alias')
            ->where('really_want_users_count', '>', 0)
            ->orderBy('really_want_users_count', 'desc')
            ->take(10)
            ->get();
        
    //  $items = Item::withCount('reallyWantUsers')->having('really_want_users_count', '>', 0)->orderBy('really_want_users_count', 'desc')->take(10)->get();
     
         return view('ranking.reallyWantRanking', [
            'items' => $items,
        ]);
    }
    
  
}
