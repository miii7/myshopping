@extends('layouts.app')

/*@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>My Shopping</h1>
                @if (!Auth::check())
                    <a href="{{ route('signup.get') }}" class="btn btn-success btn-lg">Start</a>
                @endif
            </div>
        </div>
    </div>
@endsection
*/

@section('content')
    @if (Auth::check())
        {{ Auth::user()->name }}
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
@endsection