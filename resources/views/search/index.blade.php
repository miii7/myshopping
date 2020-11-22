@extends('layouts.app')

@section('content')
<div class="d-flex flex-row">
    <div class="mt-4 mb-4 col-6"> 
        {!! Form::open(['route' => 'search.index', 'method' => 'get']) !!}
        <div class="form-group">
            {!! Form::label('text', 'キーワード') !!}
            {!! Form::text('keyword' ,'', ['class' => 'form-control', 'value'=>'{{ $keyword }}','placeholder' => '※必須'] ) !!}
        </div>
            
        <div class="form-group">
            {!! Form::label('text', '金額') !!}
            <div class="d-flex flex-row">     
                {!! Form::text('minPrice' ,'', ['class' => 'form-control', 'placeholder' => '100'] ) !!}
                <p>〜</p>
                {!! Form::text('maxPrice' ,'', ['class' => 'form-control','placeholder' => '9,999,999'] ) !!}
                <p>円</p>
            </div>
        </div>
         
        <div class="form-group">
            {!! Form::label('sort', '並び順') !!} 
            {!! Form::select('sort', ['null'=>'指定しない','+itemPrice'=>'価格の安い順','-itemPrice'=>'価格の高い順'],null,['class' => 'form-control'] ) !!}
        </div>
         
        {!! Form::submit('Search', ['class' => 'mt-4 btn btn-info']) !!}
        {!! Form::close() !!}
    </div>
    
    <div class="bag">
        <img src="{{ url('/images/bag.png') }}">    
    </div> 
</div>  
       
    
    @if (count($items) > 0)
        <div class="d-flex flex-row">
            @if($minPrice !== null)
                <p>「{{ $minPrice }}円」以上</p>
            @endif
            
            @if($maxPrice !== null)
                <p>「{{ $maxPrice }}円」未満</p>
             @endif
        
            @if($sort === "+itemPrice")
                <p>「価格の安い順」</p>
            @endif
        
            @if($sort === "-itemPrice")
                <p>「価格の高い順」</p>
            @endif
        </div>    
        <div class="keyword">
            <p>{{ $keyword }}の検索結果一覧</p>
        </div>
     
   
        <div class="mt-4 row">     
            @foreach ($items as $item)
                <div class="mb-5 col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ $item['mediumImageUrls'] }}" alt="商品の写真">
                        </div>
                        <div class="card-body">
                            <div class="item-title">
                                <a href="{{ $item['itemUrl'] }}" target="_blank">{{ $item['itemName'] }}</a>
                            </div>       
                            <p class="text-center">¥{{ number_format($item['itemPrice']) }}</p>
                            {{-- 検索ページ用Want／Not  ボタン --}}  
                            <div class="text-center">@include('search.search_want_button')</div>
                        </div>
                    </div>
                </div>
            @endforeach  
        </div>    
        {{-- ページネーションのリンク（appendsにarrayで追加したいパラメータを渡す） --}}
        <div class="pagination justify-content-center">
            {{ $items->appends($params)->links() }}  
        </div>
    @else
        {{-- キーワード空だったら --}}
        @if($keyword === null)
            <p>キーワードを入力してください。</p>
        {{-- 存在しないキーワードだったら --}}
        @else    
            <p>{{ $keyword }}の検索結果はありませんでした。</p>
        @endif
    @endif
@endsection