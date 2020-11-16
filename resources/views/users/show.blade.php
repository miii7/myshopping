@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="name text-center">
            <div class="your"><h1><i class="fas fa-heart fa-fw"></i>Your Really Want & Want</h1></div>
        </div>
        <div class="icon text-center">
             <img class="img-circle" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
        </div>
        
        <div class="d-flex justify-content-center">    
            <div class="p-2">Really Want:</div>
                <h2> {{ $user->really_wants_count }} </h2>
               
            <div class="p-2">Want:</div>
                <h2> {{ $user->nomal_wants_count }} </h2>
        </div>
    </div>
    

 @if (count($reallyWants) > 0)    
    <div class="ichiran"><h3>Really Want一覧</h3></div> 
        <div class="mt-4 row">
            @foreach ($reallyWants as $reallyWant)
                <div class="mb-5 col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ $reallyWant->image }}" alt="商品の写真">
                        </div>
                        <div class="card-body">
                            <div class="item-title">
                                <a href="{{ $reallyWant->item_url }}" target="_blank">{{ $reallyWant->item_name }}</a>
                            </div> 
                            <p class="text-center">¥{{ number_format($reallyWant->price) }}</p>
                            {{-- Want／Not  ボタン --}}  
                            <div class="text-center">@include('want.want_button',['item' => $reallyWant])</div>
                        </div>
                    </div>
                </div>
            @endforeach  
        </div>  
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">
        {{ $reallyWants->links() }}
    </div>
@endif   
   
   <hr />
   
@if (count($wants) > 0)  
    <div class="ichiran"><h3>Want一覧</h3></div>
         <div class="mt-4 row">
            @foreach ($wants as $want)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ $want->image }}" alt="商品の写真">
                        </div>
                        <div class="card-body">
                            <div class="item-title">
                                <a href="{{ $want->item_url }}" target="_blank">{{ $want->item_name }}</a>
                            </div>
                            <p class="text-center">{{ number_format($want->price) }}</p>
                            {{-- Want／Not  ボタン --}}
                            <div class="text-center">@include('want.want_button',['item' => $want])</div>
                        </div>
                    </div>
                </div>
            @endforeach  
         </div>  
    {{-- ページネーションのリンク --}}
    <div class="pagination justify-content-center">
        {{ $wants->links() }}
    </div>
@endif        
   
@endsection  


        