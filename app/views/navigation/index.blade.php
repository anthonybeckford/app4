<div class="header clearfix">
    <nav>
        <ul class="nav nav-pills float-right">
            <li class="nav-item">
                <a class="nav-link  @if(\Route::current()->getName() == 'getHome')active @endif" href="{{ \URL::route('getHome') }}">@lang('navigation.home')
                      <span class="sr-only">(current)</span>
                </a>
            </li>
            @ifUserPaid
                <li class="nav-item">
                    <a class="nav-link @if(\Route::current()->getName() == 'resources.getIndex' || \Route::current()->getName() == 'resources.getImage')active @endif" href="{{\URL::route('resources.getIndex')}}">@lang('navigation.paid_members')</a>
                </li>
            @endif
            @if(\Auth::check() )
                <li class="nav-item">
                    <a class="nav-link  @if(\Route::current()->getName() == 'getLogout')active @endif" href="{{\URL::route('getLogout')}}">@lang('navigation.logout')</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link @if(\Route::current()->getName() == 'getLogin')active @endif" href="{{\URL::route('getLogin')}}">@lang('navigation.sign_in')</a>
                </li>
            @endif

        </ul>
    </nav>
    <h3 class="text-muted">@lang('navigation.project') </h3>
</div>
