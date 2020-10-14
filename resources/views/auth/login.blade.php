@extends('layouts.auth')
@section('title', 'Login')
@section('content-auth')
<div class="row">
    <div class="col-lg-4 col-sm-12 m-auto">
        <form class="card auth_form" method="POST" action="{{ route('login') }}">
        @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Log in</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Entrar</button>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
        </div>
    </div>

</div>
@stop
