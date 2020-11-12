<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

class RankingController extends Controller
{
    public function index()
    {
        $items = Item::withCount('reallyWantUser')->orderBy('really_want_user_count', 'desc')->paginate(10);   
    
        return view('ranking.reallyWantRanking', [
            'items' => $items,
        ]);
    }
    
   
}
