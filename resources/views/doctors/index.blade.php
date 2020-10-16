@extends('layouts.main')
@section('title', 'Listagem de medicos')
@section('parentPageTitle', 'Medicos')
@section('content-main')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="btn bg-success btn-icon float-right text-white"
                           href="{{ route('doctors.create') }}"
                           title="">
                            <em class="zmdi zmdi-plus"></em>
                        </a>
                    </div>
                </div>
                <h2><strong>@lang('index.list')</strong> @lang('doctors.doctor')</h2>
            </div>
            <div class="body">
                @if(count($doctors))
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example">
                            <thead class="thead-dark">
                            <tr>
                                <th>@lang('doctors.name')</th>
                                <th>@lang('doctors.email')</th>
                                <th>@lang('doctors.crm')</th>
                                <th>@lang('doctors.action')</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>@lang('doctors.name')</th>
                                <th>@lang('doctors.email')</th>
                                <th>@lang('doctors.crm')</th>
                                <th>@lang('doctors.action')</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td>{{$doctor->name}}</td>
                                <td>{{$doctor->email}}</td>
                                <td>{{$doctor->crm}}</td>
                                <td class="text-center">
                                    <a href="{{ route('doctors.edit', $doctor->uuid) }}"
                                       class="btn btn-success btn-icon text-white"
                                       data-toggle="tooltip"
                                       title="">
                                        <em class="zmdi zmdi-edit"></em>
                                    </a>
                                    <a class="btn bg-red btn-icon text-white"
                                       data-toggle="tooltip"
                                       title=""
                                       onclick="document.getElementById('form-destroy').submit()">
                                        <em class="zmdi zmdi-delete"></em>
                                        <form style="display:none;"
                                              action="{{ route('doctors.destroy', $doctor->uuid) }}"
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
                    <strong>@lang('index.ops')</strong> @lang('doctors.not_found')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
