
{!! Form::model($request,['method'=>'get','style'=>'display: inline;margin:0px;padding:0px;','id'=>'pagination_size_form']) !!}
Page Size :
{!! Form::select('pagination_size',[config('project.pagination_size')=>config('project.pagination_size'),50=>50,100=>100,200=>200],null,
['onchange'=>'$("#pagination_size_form").submit();']) !!}

-

@if(count($request->except('pagination_size')))
    @foreach($request->except('pagination_size') as $key=>$input)
        <input type="hidden"  name="{{$key}}" value="{{$input}}">
    @endforeach
@endif
{!! Form::close() !!}