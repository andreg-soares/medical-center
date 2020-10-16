@extends('layouts.main')
@section('title', 'Listagem de Pacientes')
@section('parentPageTitle', 'Pacientes')
@section('content-main')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="btn bg-success btn-icon float-right text-white"
                           href="{{ route('patients.create') }}"
                           title="">
                            <em class="zmdi zmdi-plus"></em>
                        </a>
                    </div>
                </div>
                <h2><strong>@lang('index.list')</strong> @lang('patients.patient')</h2>
            </div>
            <div class="body">
                @if(count($patients))
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example">
                            <thead class="thead-dark">
                            <tr>
                                <th>@lang('patients.name')</th>
                                <th>@lang('patients.email')</th>
                                <th>@lang('patients.cpf')</th>
                                <th>@lang('patients.action')</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>@lang('patients.name')</th>
                                <th>@lang('patients.email')</th>
                                <th>@lang('patients.cpf')</th>
                                <th>@lang('patients.action')</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td>{{$patient->email}}</td>
                                <td>{{$patient->cpf}}</td>
                                <td class="text-center">
                                    <a href="{{ route('patients.edit', $patient->uuid) }}"
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
                                              action="{{ route('patients.destroy', $patient->uuid) }}"
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
                    <strong>@lang('index.ops')</strong> @lang('patients.not_found')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
