@extends('layouts.app')

@section('content')

@if (Auth::check())
    <div class="d-flex flex-row">
         <div class="mt-4 mb-4 col-6">
             <p>キーワードを入力してください。</p>
            <form method="GET" action="{{ route('search.index') }}">
                <input type="text" name="keyword" class="form-control" value="{{ $keyword }}"/>
                <button type="submit" class="mt-4 btn btn-info">Search</button>
            </form>
        </div>
       
        <div class="bag">
            <img src="{{ url('/images/bag.png') }}">    
        </div>
    </div>
    @if (count($items) > 0)
        <div class="row">
            <div class="col-12">
                <h2>{{ $keyword }}の検索結果一覧</h2>
         
           <<div class="mt-4 row">     
            @foreach ($items as $item)
                <div class="mb-5 col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ $item['mediumImageUrls'] }}" alt="商品の写真">
                        </div>
                        <div class="card-body">
                            <a href="{{ $item['itemUrl'] }}" target="_blank">{{ $item['itemName'] }}</a>
                            <p class="text-center">¥{{ number_format($item['itemPrice']) }}</p>
                        
                        {{-- 検索ページ用Want／Not  ボタン --}}  
                        <div class="text-center">@include('search.search_want_button')</div>
                        </div>
                    </div>
                </div>
            @endforeach  
            </div>    
                
            
            </div>
        </div>
        {{-- ページネーションのリンク --}}
        <div class="pagination justify-content-center">
            {{ $items->appends($params)->links() }}  
        </div>
           @else
      {{-- <p>{{ $noKeywordMessage }}</p> --}}
  
   
    @endif
@else



@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <div class="text-center">
                <h1>Really Want? or Want?</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Start My Shopping', [], ['class' => 'btn btn-lg btn-info']) !!}
                </div>
           </div>
        </div>
    </div> 
@endsection    
    
@endif

@endsection