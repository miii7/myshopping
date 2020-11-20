<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

//RakutenRws_Clientを利用
use RakutenRws_Client;

class SearchController extends Controller
{
 
     public function index(Request $request)
    {
        //楽天APIを扱うRakutenRws_Clientクラスのインスタンスを作成
        $client = new RakutenRws_Client();
        
        //アプリIDをセット
        $client->setApplicationId(config('app.rakuten_id'));
        
        //リクエストから検索キーワードを取り出す
        $keyword = $request->input('keyword');
        
        //最低金額100円に設定
        $minPrice = max($request->input('minPrice'), 100);
        
        //最高金額が空か、文字列か、あるいは9,999,999円以上なら、強制的に上限金額に変換する。
        $maxPrice = $request->input('maxPrice');
        if(empty($maxPrice) || !is_numeric($maxPrice) || $maxPrice > 9999999){
            $maxPrice = 9999999;
            }
        
        //並び順設定
        $sort = $request->input('sort');
   
        $items = array();
      
        // IchibaItemSearch API から、指定条件で検索
        if(!empty($keyword)){ 
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $keyword,
                'hits' => 28,
                'imageFlag' => 1,
                'page' => $request->page,
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
                'sort' => $sort,
            ));
            
            // レスポンスが正しいか
            if ($response->isOk()) {
                //配列で結果を挿入
                foreach ($response as $item){
                     $items[] = array(
                        'itemUrl' => $item['itemUrl'],
                        'itemName' => $item['itemName'],
                        'itemCode' => $item['itemCode'],
                        'itemPrice' => $item['itemPrice'],
                        //画像サイズを変更
                       'mediumImageUrls' => str_replace('?_ex=128x128', '', $item['mediumImageUrls'][0]['imageUrl']),
                        );
                }
                
                $items = new LengthAwarePaginator(
                    $items,
                    $response['count'] >= 28*100 ? 28*100 : $response['count'] ,
                    28,
                    $request->page,
                    ['path' => '/search']
                );
            }
        }
      
        $params = [ 
            'keyword' => $keyword,
            'page'  => $request->page,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sort' => $sort,
             ];
        
        $data = ['keyword' => $keyword,
            'items' => $items,
            'params' => $params,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            'sort' => $sort,
            ];
       
        return view('search.index', $data);
    }
}