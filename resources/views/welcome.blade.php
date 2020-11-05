@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>My Shopping</h1>
            <p>Really Want? or Want?</p>
            {{-- ユーザ登録ページへのリンク --}}
           {!! link_to_route('signup.get', 'Let's start', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection