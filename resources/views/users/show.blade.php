@extends('layouts.app')

@section('content')
        <div class="name text-center">
            <div class="page"><h1>{{ $user->name }}さんのページ</h1></div>
       </div>

        <div class="d-flex justify-content-center">    
            <div class="p-2">Really Want:</div>
                <h2> {{ $user->really_wants_count }} </h2>
               
            <div class="p-2">Want:</div>
                <h2> {{ $user->nomal_wants_count }} </h2>
        </div>

{{-- ReallyWant一覧 --}}
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
                        <div class="card-footer">
                            {{-- メモの内容表示 --}}
                            <div class="mt-2 memo text-center"><p>{{ $reallyWant->pivot->memo }}</p></div>
                        
                            @if(!empty($reallyWant->pivot->memo)) 
                                {{-- メモ削除ボタン --}}
                                <div class="mb-4 text-center">   
                                    {!! Form::open(['route' => ['wants.destroyMemo',$reallyWant->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('メモ削除', ['class' => 'btn btn-info btn-sm']) !!}
                                    {!! Form::close() !!} 
                                </div>
                            @else 
                                {{-- メモ作成フォーム--}}
                                    {!! Form::open(['route' => ['wants.storeMemo',$reallyWant->id]]) !!}
                                <div class="form-group">
                                    {!! Form::textarea('memo', old('memo'), ['class' => 'form-control', 'rows' => '1']) !!}
                                    {!! Form::submit('メモ入力', ['class' => 'btn btn-info btn-block']) !!}
                                </div>
                                    {!! Form::close() !!}
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach  
        </div>  
        
    {{-- ReallyWant一覧ページネーションのリンク --}}
    <div class="pagination justify-content-center">
        {{ $reallyWants->links() }}
    </div>
@endif   
   
   <hr />

{{-- Want一覧 --}}   
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
                         <div class="card-footer">
                            {{-- メモの内容表示 --}}
                            <div class="text-center memo"><p>{{ $want->pivot->memo }}</p></div>
                            
                            @if(!empty($want->pivot->memo)) 
                                {{-- メモ削除ボタン --}}
                                <div class="mb-4 text-center">   
                                    {!! Form::open(['route' => ['wants.destroyMemo',$want->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('メモ削除', ['class' => 'btn btn-info btn-sm']) !!}
                                    {!! Form::close() !!} 
                                </div>
                            @else 
                                {{-- メモ作成フォーム--}}
                                    {!! Form::open(['route' => ['wants.storeMemo',$want->id]]) !!}
                                <div class="form-group">
                                    {!! Form::textarea('memo', old('memo'), ['class' => 'form-control', 'rows' => '1']) !!}
                                    {!! Form::submit('メモ入力', ['class' => 'btn btn-info btn-block']) !!}
                                </div>
                                    {!! Form::close() !!}
                            @endif
                        </div>        
                    </div>
                </div>
            @endforeach  
         </div>  
         
    {{-- Want一覧ページネーションのリンク --}}
    <div class="pagination justify-content-center">
        {{ $wants->links() }}
    </div>
@endif        
   
@endsection  


        