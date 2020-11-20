<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//追加
use App\Item;  

class WantsController extends Controller
{
     public function store(Request $request, $code)
    {
        $item = Item::firstOrCreate([
                'code' => $code ],
            ['item_url' => $request->item_url,
            'item_name' => $request->item_name,
            'image'=> $request->image,
            'price'=> $request->price,
            ]);
        
        \Auth::user()->want($item->id,$request->want_kind);
        
        // 前のURLへリダイレクトさせる
        return back();
    }


        public function destroyById($itemid)
    {
        
        $item= Item::where('id', $itemid)->first();
     
        \Auth::user()->notwant($item->id);
       
        // 前のURLへリダイレクトさせる
        return back();
    }


   public function destroyByCode($code)
    {
        $item= Item::where('code', $code)->first();
        
        \Auth::user()->notwant($item->id);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
  
  
  
//memo  
    public function storeMemo(Request $request,$id)
    {
       
        if($request->user()->is_want_id($id)) {

        // 認証済みユーザのメモとして作成
        $request->user()->wants()->updateExistingPivot( $id,['memo' => $request->memo]);
        } 
        // 前のURLへリダイレクトさせる
        return back();

    }
    
    public function destroyMemo($id)
    {
        if($request->user()->is_want_id($id)) { 
            
        // 認証済みユーザのメモを削除（メモの内容をnullに変更）
         $request->user()->wants()->updateExistingPivot( $id,['memo' => null]);
        }
        // 前のURLへリダイレクトさせる
        return back();
        
    }
}



    