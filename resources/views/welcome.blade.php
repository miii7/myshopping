@extends('layouts.app')


@section('content')
    @if (Auth::check())
        <p>{{ Auth::user()->name }} . "さん"</p>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>My Shopping</h1>
                <p>Really Want? or Want?</p>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'Start', [], ['class' => 'btn btn-lg btn-info']) !!}
            </div>
        </div>
    @endif
    <img src="{{ secure_asset("../../public/images/cover.png") }}" alt="My Shopping"> //追加
@endsection