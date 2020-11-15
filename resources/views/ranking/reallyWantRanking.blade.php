@extends('layouts.app')

@section('content')
 <div class="text-center">
    <p><i class="far fa-check-square fa-fw"></i>Check it now</p>
    <div class="ranking">
    <h1> Really Want Ranking <i class="fas fa-crown fa-fw"></i>Top10</h1>
    </div>
</div>    
@if (count($items)>0)   
        <div class="mt-4 row">
            @foreach ($items as $key =>$item)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="key"><h2>{{ $key+1 }}位</h2></div>
                    <p>{{ $item->really_want_users_count }} 人がReally Want中です！</p>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image }}" alt="商品の写真">
                        </div>
                        <div class="panel-body">
                            <a href="{{ $item->item_url }}" target="_blank">{{ $item->item_name }}</a>
                            <p class="text-center">¥{{ number_format($item->price) }}</p>
                            
                            {{-- Want／Not  ボタン --}} 
                           <div class="text-center">@include('want.want_button')</div>
                        </div>
                    </div>
                </div>
            @endforeach  
        </div>  
    
@endif   
      
 
@endsection