@extends('layouts.app')

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