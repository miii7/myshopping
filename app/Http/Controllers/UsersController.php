<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加

class UsersController extends Controller
{
    public function show($id)
    {
       
        $user = User::findOrFail($id);
        
        $user->loadRelationshipCounts();
        
        // ユーザのほしい一覧を取得
        $wants = $user->nomalWants()->orderBy('created_at', 'desc')->paginate(12);
        $reallyWants = $user->reallyWants()->orderBy('created_at', 'desc')->paginate(12);

        return view('users.show', [
            'user' => $user,
            'wants' => $wants,
            'reallyWants'=>$reallyWants,
        ]);
    }
}
