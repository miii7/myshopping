<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Itemモデル使用
use App\Item;  

class WantsController extends Controller
{
//want機能     
     public function store(Request $request, $code)
    {   
        //DBにデータが存在する場合は取得し、存在しない場合はDBにデータを登録した上でインスタンスを取得する
        $item = Item::firstOrCreate([
                    //第1引数は検索条件のカラム名をキーとした連想配列
                    'code' => $code ],
                     //第2引数の連想配列は、データが取得できなかった場合にDBに保存する際に使用される    
                    ['item_url' => $request->item_url,
                    'item_name' => $request->item_name,
                    'image'=> $request->image,
                    'price'=> $request->price,
                ]);
        
        //認証済みユーザが、itemのidとWantの種類を判定してwantする
        \Auth::user()->want($item->id,$request->want_kind);
        
        // 前のURLへリダイレクトさせる
        return back();
    }

        public function destroyById($itemId)
    {
        //Itemモデルのidが$itemIdのものについて、最初のレコードを1件だけ取得する
        $item= Item::where('id', $itemId)->first();
        
        //認証済みユーザが、itemのidを判定してnotwantする
        \Auth::user()->notwant($item->id);
       
        // 前のURLへリダイレクトさせる
        return back();
    }


   public function destroyByCode($code)
    {   
        //Itemモデルのcodeが$codeのものについて、最初のレコードを1件だけ取得する
        $item= Item::where('code', $code)->first();
        
        //認証済みユーザが、itemのidを判定してnotwantする
        \Auth::user()->notwant($item->id);
        
        // 前のURLへリダイレクトさせる
        return back();
    }
  
  
  
//memo機能  
    public function storeMemo(Request $request,$id)
    {
       //メモの上限を25文字に指定
       $request->validate([
            'memo' => 'max:25',
        ]);
       
        if($request->user()->is_want_id($id)) {

        // 認証済みユーザのメモとして作成
        $request->user()->wants()->updateExistingPivot( $id,['memo' => $request->memo]);
        } 
        // 前のURLへリダイレクトさせる
        return back();

    }
    
    public function destroyMemo($id)
    {
        if(\Auth::user()->is_want_id($id)) { 
            
        // 認証済みユーザのメモを削除（メモの内容をnullに変更）
         \Auth::user()->wants()->updateExistingPivot( $id,['memo' => null]);
        }
        // 前のURLへリダイレクトさせる
        return back();
        
    }
    
        public function editMemo(Request $request,$id)
    {
        //メモの上限を25文字に指定
        $request->validate([
            'memo' => 'max:25',
        ]);
        
        if($request->user()->is_want_id($id)) {

        // 認証済みユーザのメモを編集
        $request->user()->wants()->updateExistingPivot( $id,['memo' => $request->memo]);
        } 
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    
    
    
    
}



    