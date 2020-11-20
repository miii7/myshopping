@if($reallyWant->pivot->memo　=== null)
    {!! Form::open(['route' => ['wants.storeMemo',$reallyWant->id]]) !!}
    <div class="form-group">
        {!! Form::textarea('memo', old('memo'), ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::submit('メモ入力', ['class' => 'btn btn-info btn-block']) !!}
    </div>
    {!! Form::close() !!}
@else
    {{-- 投稿削除ボタンのフォーム --}}
    {!! Form::open(['route' => ['notMemo.destroy',$reallyWant->id], 'method' => 'delete']) !!}
    {!! Form::submit('メモ削除', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif        


{{--
@if($want->pivot->memo　=== null)
    {!! Form::open(['route' => ['wants.storeMemo',$want->id]]) !!}
    <div class="form-group">
        {!! Form::textarea('memo', old('memo'), ['class' => 'form-control', 'rows' => '1']) !!}
        {!! Form::submit('メモ入力', ['class' => 'btn btn-info btn-block']) !!}
    </div>
    {!! Form::close() !!}
@else
    {{-- 投稿削除ボタンのフォーム 
    {!! Form::open(['route' => ['notMemo.destroy',$want->id], 'method' => 'delete']) !!}
    {!! Form::submit('メモ削除', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif    --}}
