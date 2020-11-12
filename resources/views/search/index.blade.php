@extends('layouts.app')

@section('content')


<div class="container">
            <h1>My Shopping API Test</h1>

            <div class="row">
                <div class="col-6">
                    <form method="GET" action="{{ route('search') }}">
                        <input type="text" name="keyword" class="form-control" value="{{ $keyword }}"/>
                        
                        <button type="submit" class="btn btn-info">Search</button>
                       </form>
                </div>
            </div>
</div>

@if (count($items) > 0)

                <div class="row">
                    <div class="col-12">
                        <h2>{{ $keyword }}の検索結果一覧</h2>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">画像</th>
                                    <th>商品名（商品コード）</th>
                                    <th>価格</th>
                                </tr>
                            </thead>
                            <tbody>
                                 @foreach ($items as $item) 
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ $item['mediumImageUrls'] }}"　alt=""> 
                                        </td>
                                        <td>
                                            <a href="{{ $item['itemUrl'] }}" target="_blank">
                                                {{ $item['itemName'] }}</a></br>
                                                <p>{{ $item['itemCode'] }}</p>
                                               
                                                {{-- Want／Not  Wantボタン --}}  
                                                @include('want.want_button')
                                                
                                            </td>
                                        <td>
                                          {{ (number_format ($item['itemPrice'] )) }}
                                        </td>
                                    </tr>
                                   
                                 @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
@else
  
                
@endif
   

@endsection