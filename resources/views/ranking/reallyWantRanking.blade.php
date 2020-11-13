@extends('layouts.app')

@section('content')
 <div class="text-center">
    <h1>Really Want ランキング</h1>
    <p>-HOT NOW-</p>
</div>    
@if (count($items)>0)   
        <div class="mt-4 row">
            @foreach ($items as $key =>$item)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <p>{{ $key+1 }}位</p>
                    <p>{{ $item->really_want_users_count }} 人がReally Wantしています！</p>
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image }}" alt="商品の写真">
                        </div>
                        <div class="panel-body">
                            <a href="{{ $item->item_url }}" target="_blank">{{ $item->item_name }}</a>
                            <p class="text-center">{{ number_format($item->price) }}</p>
                            
                            {{-- Want／Not  ボタン --}} 
                            // @include('want.want_button')
                        </div>
                    </div>
                </div>
            @endforeach  
        </div>  
    
@endif   
      
 
@endsection