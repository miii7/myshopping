@extends('layouts.app')

@section('content')
    <h1>Really Wantランキング</h1>
    <p>HOT NOW!!!</p>
 
@if ($items)
    <div class="row">
        
        @foreach ($items as $key => $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="">
                        </div>
                        <div class="panel-body">
                            <p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></p>
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('items.want_button', ['item' => $item])
                                    @include('items.have_button', ['item' => $item])
                                @endif
                            </div>
                        </div> 
    
    
    
            @if (isset($reallyWants->count))
            <div class="panel-footer">
             <p class="text-center">{{ $key+1 }}位:  {{ $reallyWants->count}} 人</p>
             </div>
            @endif
    
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif         
             
@endsection