<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RankingController extends Controller
{
    public function index()
    {
     $items = Item::withCount('reallyWantUsers')->having('really_want_users_count', '>', 0)->orderBy('really_want_users_count', 'desc')->take(10)->get();
     
         return view('ranking.reallyWantRanking', [
            'items' => $items,
        ]);
    }
    
  
}
