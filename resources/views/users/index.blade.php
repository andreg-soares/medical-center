@extends('layouts.main')
@section('title', 'Listagem de Usuarios')
@section('parentPageTitle', 'Usuarios')
@section('content-main')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="btn bg-success btn-icon float-right text-white"
                           href="{{ route('users.create') }}"
                           title="">
                            <em class="zmdi zmdi-plus"></em>
                        </a>
                    </div>
                </div>
                <h2><strong>@lang('index.list')</strong> @lang('users.user')</h2>
            </div>
            <div class="body">
                @if(count($users))
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example">
                            <thead class="thead-dark">
                            <tr>
                                <th>@lang('users.name')</th>
                                <th>@lang('users.email')</th>
                                <th>@lang('users.action')</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>@lang('users.name')</th>
                                <th>@lang('users.email')</th>
                                <th>@lang('users.action')</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td class="text-center">
                                    <a href="{{ route('users.edit', $user->id) }}"
                                       class="btn btn-success btn-icon text-white"
                                       data-toggle="tooltip"
                                       title="">
                                        <em class="zmdi zmdi-edit"></em>
                                    </a>
                                    <a class="btn bg-red btn-icon text-white {{Auth::user()->id === $user->id?'hidden':''}}"
                                       data-toggle="tooltip"
                                       title=""
                                       onclick="document.getElementById('form-destroy').submit()"
                                    style="display: ">
                                        <em class="zmdi zmdi-delete"></em>
                                        <form style="display:none;"
                                              action="{{ route('users.destroy', $user->id) }}"
                                              method="post"
                                              id="form-destroy">
                                            @csrf'
                                            @method('delete')
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @else
                <div class="alert alert-danger">
                    <strong>@lang('index.ops')</strong> @lang('users.not_found')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
