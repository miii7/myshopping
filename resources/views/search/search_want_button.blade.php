@if(Auth::user()->is_want($item['itemCode']))
        {!! Form::open(['route' => ['wants.destroyByCode', $item['itemCode']], 'method' => 'delete']) !!}
        {!!  Form::submit('Not Want', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
        
@else  
    <div class="row justify-content-around">
      <div class="col-4">
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_url" value="{{ $item['itemUrl'] }}">
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="reallyWant">
        {!! Form::submit('Really Want', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
      </div>
      
      <div class="col-4">
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_url" value="{{ $item['itemUrl'] }}">
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="want">
        {!! Form::submit('Want', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
      </div>
    </div>
@endif        
  