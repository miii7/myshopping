@if (count($items) > 0)  
    <div class="row">
        
        @foreach ($items as $key => $item)
            <div class="item">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">
                            <img src="{{ $item->image_url }}" alt="商品の写真">
                        </div>
                        <div class="panel-body">
                            <p>{{ $item->name }}</p>
                            <p class="text-center"><a href="{{ $item->url }}" target="_blank">楽天詳細ページへ</a></p>
                            
                            
                            //<p class="item-title"><a href="{{ route('items.show', $item->id) }}">{{ $item->name }}</a></p>
                            <div class="buttons text-center">
                                @if (Auth::check())
                                    @include('want.want_button', ['item' => $item])
                                    @include('items.have_button', ['item' => $item])
                                @endif
                            </div>
                        </div>
                        
                        @if (isset($item->count))
                            <div class="panel-footer">
                                <p class="text-center">{{ $key+1 }}位:  {{ $item->count}} 人</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif