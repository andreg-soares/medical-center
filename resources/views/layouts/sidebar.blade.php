<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="#"><img src="../assets/images/logo.svg" width="25" alt="Aero"><span class="m-l-10">Medical Center</span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <div class="image"><a href="#"><img src="../assets/images/profile_av.jpg" alt="User"></a></div>
                    <div class="detail">
                        <h4>{{Auth::user()->name}}</h4>
                    </div>
                </div>
            </li>
            <li class="{{ Request::segment(0) === 'dashboard' ? 'active open' : null }}"><a href="#"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li>
            <form id="form-logout" method="POST" action="{{route('logout')}}">
            @csrf
            <a onclick="document.getElementById('form-logout').submit()" ><i class="zmdi zmdi-power"></i><span>Sair</span></a>
            </form>
            </li>
        </ul>
    </div>
</aside>
