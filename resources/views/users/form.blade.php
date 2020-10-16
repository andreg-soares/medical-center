@extends('layouts.main')
@section('title', 'Formulario de Usuarios')
@section('parentPageTitle', 'Usuarios')
@section('content-main')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                @if(isset($user))
                <h2><strong>@lang('index.edit')</strong> @lang('users.user')</h2>
                @else
                <h2><strong>@lang('index.create')</strong> @lang('users.user')</h2>
                @endif
            </div>
            <div class="body">
                <form action="
                    @if(!isset($user))
                    {{route('users.store')}}
                    @else
                    {{route('users.update',$user->id)}}
                    @endif" method="post">

                    @csrf
                    @if(isset($user))
                    @method('PATCH')
                    @endif
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('users.name')</label>
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-face"></i></span>
                                </div>
                                <input type="text" name="name" value="{{!isset($user)?old('name'):$user->name}}"
                                       class="form-control" placeholder="@lang('users.name')">
                                @if ($errors->has('name'))
                                <label id="name-error"
                                       class="error"
                                       for="name"><strong>{{ $errors->first('name') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('users.email')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                <input type="email" name="email"
                                       value="{{!isset($user)?old('email'):$user->email}}"
                                       class="form-control email" placeholder="@lang('users.email')">
                                @if ($errors->has('email'))
                                <label id="email-error"
                                       class="error"
                                       for="email"><strong>{{ $errors->first('email') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('users.password')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-lock"></i></span>
                                </div>
                                <input type="password" name="password"
                                       class="form-control"
                                       placeholder="@lang('users.password')">
                                @if ($errors->has('password'))
                                <label id="password-error"
                                       class="error"
                                       for="password"><strong>{{ $errors->first('password') }}</strong></label>
                                @endif
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 align-right">
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
