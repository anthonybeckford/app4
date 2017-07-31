@extends('master')
@section('content')
<p><a class="btn btn-lg btn-success" href="{{ \URL::route('resources.getIndex') }}" role="button">@lang('resource.back')</a></p>
<h4>@lang('resource.display_resource', ['name' => $resource ])</h4>
<img src="{{$img}}">
@stop