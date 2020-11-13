<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;  //追加

class WantsController extends Controller
{
     public function store(Request $request, $code)
    {
    
        /*$item = new Item;
        $item->code = $code;
        $item->item_name = $request->item_name;
        $item->image = $request->image;
        $item->price = $request->price;
        $item->save();
        */
          
        $item = Item::firstOrCreate([
                'code' => $code ],
            ['item_url' => $request->item_url,
            'item_name' => $request->item_name,
            'image'=> $request->image,
            'price'=> $request->price,
            ]);
        
        \Auth::user()->want($item->id,$request->want_kind);
        
        
       /* $item = Item::firstOrCreate([
                'id' => $id ],
            ['code' => $request->code,
            'item_url' => $request->item_url,
            'item_name' => $request->item_name,
            'image'=> $request->image,
            'price'=> $request->price,
            ]);
        
         \Auth::user()->want($item->id,$request->want_kind);
        */
        
        // 前のURLへリダイレクトさせる
        return back();
    }


        public function destroy($itemid)
    {
        $item= Item::where('id', $itemid)->first();
        
        \Auth::user()->notwant($item->id);
        // 前のURLへリダイレクトさせる
        return back();
    }


   /* public function destroy($code)
    {
        $item= Item::where('code', $code)->first();
        
        \Auth::user()->notwant($item->id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    */
    
}
