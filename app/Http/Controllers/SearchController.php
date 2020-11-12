<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use RakutenRws_Client;

class SearchController extends Controller
{
     public function index(Request $request)
    {
        $client = new RakutenRws_Client();
        define("RAKUTEN_APPLICATION_ID"     , config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SECRET", config('app.rakuten_key'));
        
        $client->setApplicationId(1064777723809602160);

        $keyword = $request->input('keyword');
       
       $items = array();
        if(!empty($keyword)){ 
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $keyword,
                'hits' => 5,
                'imageFlag' => 1,
            ));
            
            if ($response->isOk()) {
                
                foreach ($response as $item){
            
                    $items[] = array(
                        'itemUrl' => $item['itemUrl'],
                        'itemName' => $item['itemName'],
                        'itemCode' => $item['itemCode'],
                        'itemPrice' => $item['itemPrice'],
                        'mediumImageUrls' => $item['mediumImageUrls'][0]['imageUrl'],  
                        );
                }
            }
            
        }
        
        $data = ['keyword' => $keyword,
            'items' => $items,];
        
        return view('search.index', $data);
        
    }
}