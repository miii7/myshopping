{{$item->id}}
@if(Auth::user()->is_want_id($item->id))
        {!! Form::open(['route' => ['wants.destroyById', $item->id], 'method' => 'delete']) !!}
        {!!  Form::submit('Not Want', ['class' => "btn btn-secondary btn-sm"]) !!}
        {!! Form::close() !!}
        
@else        
        {!! Form::open(['route' => ['wants.store', $item->code]]) !!}
          <input type="hidden" name="item_code" value="{{ $item->code }}">
          <input type="hidden" name="item_url" value="{{ $item->item_url }}">
          <input type="hidden" name="item_name" value="{{ $item->item_name }}">
          <input type="hidden" name="image" value="{{ $item->image }}">
          <input type="hidden" name="price" value="{{ $item->price }}">
          <input type="hidden" name="want_kind" value="reallyWant">
          <div class="btn-toolbar">
            <div class="btn-group">  
              {!! Form::submit('Really Want', ['class' => "btn btn-primary btn-sm"]) !!}
            </div>
        {!! Form::close() !!}
        
        {!! Form::open(['route' => ['wants.store', $item->code]]) !!}
          <input type="hidden" name="item_code" value="{{ $item->code }}">
          <input type="hidden" name="item_url" value="{{ $item->item_url }}">
          <input type="hidden" name="item_name" value="{{ $item->item_name }}">
          <input type="hidden" name="image" value="{{ $item->image }}">
          <input type="hidden" name="price" value="{{ $item->price }}">
          <input type="hidden" name="want_kind" value="want">
            <div class="btn-group">   
              {!! Form::submit('Want', ['class' => "btn btn-success btn-sm"]) !!}
            </div>
          </div>
        {!! Form::close() !!}
@endif        
  
  
