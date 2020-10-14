@extends('layouts.auth')
@section('title', 'Login')
@section('content-auth')
<div class="row">
    <div class="col-lg-4 col-sm-12 m-auto">
        <form class="card auth_form" method="POST" action="/two-factor-challenge">
        @csrf
            <div class="header">
                <img class="logo" src="{{asset('assets/images/logo.svg')}}" alt="">
                <h5>Confirme o acesso à sua conta inserindo o código de autenticação fornecido pelo seu aplicativo autenticador.</h5>
            </div>
            <div class="body">
                <div class="input-group mb-3">
                    <input type="numeric" name="code" class="form-control" placeholder="Codigo">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Enviar</button>
            </div>
        </form>
        <div class="copyright text-center">
            &copy;
            <script>document.write(new Date().getFullYear())</script>
        </div>
    </div>

</div>
@stop
