@extends('layouts.app')

@section('content')
    <div class="user-profile">
        <div class="name text-center">
            <h1>{{ $user->name }}さん</h1>
        </div>
        <div class="icon text-center">
             <img class="img-circle" src="{{ Gravatar::get($user->email, ['size' => 100]) }}" alt="">
        </div>
        
          
        <div class="d-flex justify-content-center">    
                    <div class="p-2 status-label">Really Want:</div>
                    <div id="reallyWants_count" class="status-value">
                       <h3> {{ $user->really_wants_count }} </h3>
                    </div>
               
                    <div class="p-2 status-label">Want:</div>
                     <div id="wants_count" class="status-value">
                       <h3> {{ $user->nomal_wants_count }} </h3>
                   </div>
        </div>
    </div>

 @if (count($reallyWants) > 0)    
    <h3>●Really Want一覧</h3> 
        <div class="mt-4 row">
            @foreach ($reallyWants as $reallyWant)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $reallyWant->image }}" alt="商品の写真">
                        </div>
                        <div class="panel-body">
                            <a href="{{ $reallyWant->item_url }}" target="_blank">{{ $reallyWant->item_name }}</a>
                            <p class="text-center">{{ number_format($reallyWant->price) }}</p>
                        
                        {{-- Want／Not  ボタン --}}  
                        @include('want.want_button')
                        </div>
                    </div>
                </div>
               
            @endforeach  
        </div>  
     {{-- ページネーションのリンク --}}
      {{ $reallyWants->links() }}
   
@endif   
   
@if (count($wants) > 0)  
    <h3>●Want一覧</h3>
         <div class="mt-4 row">
            @foreach ($wants as $want)
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $want->image }}" alt="商品の写真">
                        </div>
                        <div class="panel-body">
                            <a href="{{ $want->item_url }}" target="_blank">{{ $want->item_name }}</a>
                            <p class="text-center">{{ number_format($want->price) }}</p>
                            {{-- Want／Not  ボタン --}}
                            
                        </div>
                    </div>
                </div>
            @endforeach  
         </div>  
      
      {{-- ページネーションのリンク --}}
      {{ $wants->links() }}
@endif        
   
@endsection  


        