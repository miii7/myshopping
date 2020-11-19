<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Pagination\LengthAwarePaginator;

use RakutenRws_Client;

class SearchController extends Controller
{
 
     public function index(Request $request)
    {
      
        $client = new RakutenRws_Client();
        $client->setApplicationId(config('app.rakuten_id'));

        $keyword = $request->input('keyword');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        
        
        $items = array();
        
        if(!empty($keyword)){ 
            $response = $client->execute('IchibaItemSearch', array(
                'keyword' => $keyword,
                'hits' => 28,
                'imageFlag' => 1,
                'page' => $request->page,
                'minPrice' => $minPrice,
                'maxPrice' => $maxPrice,
               
            ));
            
            if ($response->isOk()) {
                foreach ($response as $item){
                     $items[] = array(
                        'itemUrl' => $item['itemUrl'],
                        'itemName' => $item['itemName'],
                        'itemCode' => $item['itemCode'],
                        'itemPrice' => $item['itemPrice'],
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
            'maxPrice' => $maxPrice
             ];
        
        $data = ['keyword' => $keyword,
            'items' => $items,
            'params' => $params,
            'minPrice' => $minPrice,
            'maxPrice' => $maxPrice,
            ];
       
        return view('search.index', $data);
    }
}