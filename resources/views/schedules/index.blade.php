@extends('layouts.main')
@section('title', 'Listagem de Agendamentos')
@section('parentPageTitle', 'Agendamentos')
@section('content-main')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <a class="btn bg-success btn-icon float-right text-white"
                           href="{{ route('schedules.create') }}"
                           title="">
                            <em class="zmdi zmdi-plus"></em>
                        </a>
                    </div>
                </div>
                <h2><strong>@lang('index.list')</strong> @lang('schedules.schedule')</h2>
            </div>
            <div class="body">
                @if(count($schedules))
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example">
                            <thead class="thead-dark">
                            <tr>
                                <th>@lang('schedules.patient')</th>
                                <th>@lang('schedules.doctor')</th>
                                <th>@lang('schedules.date')</th>
                                <th>@lang('schedules.action')</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>@lang('schedules.patient')</th>
                                <th>@lang('schedules.doctor')</th>
                                <th>@lang('schedules.date')</th>
                                <th>@lang('schedules.action')</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($schedules as $schedule)
                            <tr>
                                <td>{{$schedule->schedule_date}}</td>
                                <td>{{$schedule->doctor->name}}</td>
                                <td>{{$schedule->patient->name}}</td>
                                <td class="text-center">
                                    <a class="btn bg-red btn-icon text-white"
                                       data-toggle="tooltip"
                                       title=""
                                       onclick="document.getElementById('form-destroy').submit()">
                                        <em class="zmdi zmdi-delete"></em>
                                        <form style="display:none;"
                                              action="{{ route('schedules.destroy', $schedule->uuid) }}"
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
                    <strong>@lang('index.ops')</strong> @lang('schedules.not_found')
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@stop
