@if(Auth::user()->is_want($item['itemCode']))
        {!! Form::open(['route' => ['wants.destroy', $item['itemCode']], 'method' => 'delete']) !!}
        {!!  Form::submit('Not Want', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
        
@else        
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="reallyWant">
        {!! Form::submit('Really Want', ['class' => "btn btn-primary btn-sm"]) !!}
        {!! Form::close() !!}
        
        {!! Form::open(['route' => ['wants.store', $item['itemCode']]]) !!}
          <input type="hidden" name="item_name" value="{{ $item['itemName'] }}">
          <input type="hidden" name="image" value="{{ $item['mediumImageUrls'] }}">
          <input type="hidden" name="price" value="{{ $item['itemPrice'] }}">
          <input type="hidden" name="want_kind" value="want">
        {!! Form::submit('Want', ['class' => "btn btn-success btn-sm"]) !!}
        {!! Form::close() !!}
@endif        
  
  
