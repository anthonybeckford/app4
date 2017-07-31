@extends('master')

@section('content')

    <div class="auth">
    <div class="wrap">
        {{ \Form::open(['route' => 'postLogin', 'id' => 'signin-form']) }}
        <h4>@lang('auth.title')</h4>
        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">@lang('auth.email')</label>
            <div class="col-sm-10">
                {{ \Form::email('email') }}
            </div>
        </div>

        <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">@lang('auth.password')</label>
            <div class="col-sm-10">
                {{ \Form::password('password') }}
            </div>
        </div>

        {{ \Form::submit(\Lang::get('auth.login'),['class' => 'btn btn-primary']) }}
        {{ \Form::close() }}

    </div>
    <p>
        @lang('auth.no_account')
            {{ \HTML::linkRoute('getRegister', \Lang::get('auth.create_an_account')) }}
    </p>
    </div>





@stop