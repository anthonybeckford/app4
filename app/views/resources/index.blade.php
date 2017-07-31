@extends('master')
@section('content')
    <h4>@lang('resource.all_resources')</h4>
    <div class="list-group">
    @foreach($resources as $resource)
            <a href="{{\URL::route('resources.getImage',[ 'id' => $resource->id ])}}" class="list-group-item list-group-item-action">@lang('resource.click_here', ['name' => $resource->name])</a>
    @endforeach
    </div>
@stop

