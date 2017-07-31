@extends('master')

@section('content')
                {{ \Form::open(['route' => 'postRegister', 'id' => 'register-form']) }}
                <h4>@lang('register.title')</h4>
                <div class="form-group row">
                    <label for="inputFirstName" class="col-sm-2 col-form-label">@lang('register.first_name')</label>
                    <div class="col-sm-10">
                    {{ \Form::text('first_name', \Input::old('first_name', $first_name), ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputLastName" class="col-sm-2 col-form-label">@lang('register.last_name')</label>
                    <div class="col-sm-10">
                    {{ \Form::text('last_name', \Input::old('last_name', $last_name), ['class' => 'form-control']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">@lang('register.email')</label>
                    <div class="col-sm-10">
                    {{ \Form::email('email', \Input::old('email', $email), ['class' => 'form-control', 'id' => 'email', 'autocomplete' => 'off', 'autocorrect' => 'off']) }}
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">@lang('register.password')</label>
                    <div class="col-sm-10">
                    {{ \Form::password('password', ['class' => 'form-control', 'autocomplete' => 'off', 'autocorrect' => 'off']) }}
                        <small id="fileHelp" class="form-text text-muted">@lang('register.password_info')</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputConfirmPassword" class="col-sm-2 col-form-label">@lang('register.confirm_password')</label>
                    <div class="col-sm-10">
                    {{ \Form::password('confirmPassword', ['class' => 'form-control', 'autocomplete' => 'off', 'autocorrect' => 'off']) }}
                    </div>
                </div>
                {{ \Form::submit('Register', ['class' => 'btn btn-primary']) }}
                {{ \Form::close() }}
@stop
