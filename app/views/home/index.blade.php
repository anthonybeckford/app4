@extends('master')

@section('content')

   @if(\Auth::check())
      @include('payment.partials.src')
   @endif

   <div class="jumbotron">

      @if(!\Auth::check())
      <h1 class="display-3">@lang('home.title')</h1>
      <p class="lead">@lang('home.lead')</p>
      <p><a class="btn btn-lg btn-success" href="{{ \URL::route('getRegister') }}" role="button">@lang('home.sign_up')</a></p>
      @else
         <p class="lead">@lang('home.welcome',['name'=> (string) \Auth::user()])</p>
         @ifUserPaid
         <p>@lang('home.get_access_to_content')</p>
         @else
         <p>@lang('home.make_a_payment_info')</p>
         <p><a class="btn btn-lg btn-success" href="{{ \URL::route('payment') }}" role="button">@lang('home.make_a_payment')</a></p>
         @endif
      @endif
   </div>

   <div class="row marketing">
      <div class="col-lg-6">
         <h4 class="kitten-title">@lang('home.info.fact_1.title')</h4>
         <p>@lang('home.info.fact_1.data')</p>

         <h4 class="kitten-title">@lang('home.info.fact_2.title')</h4>
         <p>@lang('home.info.fact_2.data')</p>

         <h4 class="kitten-title">@lang('home.info.fact_3.title')</h4>
         <p>@lang('home.info.fact_3.data')</p>
      </div>

      <div class="col-lg-6">
         <h4 class="kitten-title">@lang('home.info.fact_4.title')</h4>
         <p>@lang('home.info.fact_4.data')</p>

         <h4 class="kitten-title">@lang('home.info.fact_5.title')</h4>
         <p>@lang('home.info.fact_5.data')</p>

         <h4 class="kitten-title">@lang('home.info.fact_6.title')</h4>
         <p>@lang('home.info.fact_6.data')</p>
      </div>
   </div>


@stop


