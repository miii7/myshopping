<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザのほしい一覧を取得
        $wants = $user->nomalWants()->orderBy('created_at', 'desc')->paginate(10);
        $reallyWants = $user->reallyWants()->orderBy('created_at', 'desc')->paginate(10);

       
        return view('users.show', [
            'user' => $user,
            'wants' => $wants,
            'reallyWants'=>$reallyWants,
        ]);
    }
    

}
