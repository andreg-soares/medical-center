<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="{{asset('images/logo.png')}}" width="25" alt="Aero"><span class="m-l-10">Medical Center</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="{{asset('images/man.png')}}" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                </div>
            </li>
            <li class="{{ Route::currentRouteName() == 'dashboard' ? 'active open' : null }}"><a href="{{route('dashboard')}}"><i class="zmdi zmdi-home"></i><span>@lang('index.sidebar.dashboard')</span></a></li>
            <li class="{{ Route::currentRouteName() == 'doctors.index' ? 'active open' : null }}"><a href="{{route('doctors.index')}}"><i class="zmdi zmdi-hospital"></i><span>@lang('index.sidebar.doctor')</span></a></li>
            <li class="{{ Route::currentRouteName() == 'patients.index' ? 'active open' : null }}"><a href="{{route('patients.index')}}"><i class="zmdi zmdi-account"></i><span>@lang('index.sidebar.patient')</span></a></li>
            <li class="{{ Route::currentRouteName() == 'schedules.index' ? 'active open' : null }}"><a href="{{route('schedules.index')}}"><i class="zmdi zmdi-book"></i><span>@lang('index.sidebar.schedules')</span></a></li>
            <li class="{{ Route::currentRouteName() == 'users.index' ? 'active open' : null }}"><a href="{{route('users.index')}}"><i class="zmdi zmdi-account"></i><span>@lang('index.sidebar.users')</span></a></li>
            <li>
            <form id="form-logout" method="POST" action="{{route('logout')}}">
            @csrf
            <a onclick="document.getElementById('form-logout').submit()" ><i class="zmdi zmdi-power"></i><span>@lang('index.sidebar.exit')</span></a>
            </form>
            </li>
        </ul>
    </div>
</aside>
