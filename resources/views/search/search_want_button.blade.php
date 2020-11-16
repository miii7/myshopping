@if(Auth::user()->is_want($item['itemCode']))
        {!! Form::open(['route' => ['wants.destroyByCode', $item['itemCode']], 'method' => 'delete']) !!}
        {!!  Form::submit('Not Want', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
        
@else        
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_url" value="{{ $item['itemUrl'] }}">
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="reallyWant">
          <div class='btn-toolbar'>
            <div class="btn-group">          
              {!! Form::submit('Really Want', ['class' => "btn btn-primary btn-sm"]) !!}
            </div>
        {!! Form::close() !!}
        
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_url" value="{{ $item['itemUrl'] }}">
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="want">
            <div class="btn-group">      
              {!! Form::submit('Want', ['class' => "btn btn-success btn-sm"]) !!}
            </div>
          </div>
        {!! Form::close() !!}
@endif        
  