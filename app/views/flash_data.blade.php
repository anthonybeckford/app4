
<div class="flash-data">


    @if(\Session::has('success'))
        @if(is_array(\Session::get('success')))
            @foreach(\Session::get('success') as $message)
                <div class="success">
                    <section class="inner">
                        {{ $message }}
                    </section>
                </div>
            @endforeach
        @else
            <div class="success">
                <section class="inner">
                    {{ \Session::get('success') }}
                </section>
            </div>
        @endif
    @endif

    @if(\Session::has('info'))
        @if(is_array(\Session::get('info')))
            @foreach(\Session::get('info') as $message)
                <div class="info">
                    <section class="inner">
                        {{ $message }}
                    </section>
                </div>
            @endforeach
        @else
            <div class="info">
                <section class="inner">
                    {{ \Session::get('info') }}
                </section>
            </div>
        @endif
    @endif

    @if($errors->any())
        <div class="error">
            <section class="inner">
                Please correct the following errors :
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </section>
        </div>
    @endif

    @if(\Session::has('error'))
        @if(is_array(\Session::get('error')))
            @foreach(\Session::get('error') as $message)
                <div class="error">
                    <section class="inner">
                        {{ $message }}
                    </section>
                </div>
            @endforeach
        @else
            <div class="error">
                <section class="inner">
                    {{ \Session::get('error') }}
                </section>
            </div>
        @endif
    @endif




</div>
