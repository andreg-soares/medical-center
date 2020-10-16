@extends('layouts.main')
@section('title', 'Formulario de agendamento')
@section('parentPageTitle', 'Agendamentos')
@section('content-main')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                @if(isset($schedule))
                <h2><strong>@lang('index.edit')</strong> @lang('schedules.schedule')</h2>
                @else
                <h2><strong>@lang('index.create')</strong> @lang('schedules.schedule')</h2>
                @endif
            </div>
            <div class="body">
                <form action="
                    @if(!isset($schedule))
                    {{route('schedules.store')}}
                    @else
                    {{route('schedules.update',$schedule->uuid)}}
                    @endif" method="post">

                    @csrf
                    @if(isset($schedule))
                    @method('PATCH')
                    @endif
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('schedules.date')</label>
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                </div>
                                <input type="datetime-local" name="schedule_date"
                                       value="{{!isset($schedule)?old('schedule_date'):date('yy-m-d', strtotime($schedule->schedule_date)).'T'.date('h:m', strtotime($schedule->schedule_date))}}"
                                       class="form-control" placeholder="@lang('schedules.date')">
                                @if ($errors->has('schedule_date'))
                                <label id="schedule_date-error"
                                       class="error"
                                       for="schedule_date"><strong>{{ $errors->first('schedule_date')
                                        }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('schedules.doctor')</label>
                            <select name="doctor" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach($doctors as $doctor)
                                <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('doctor'))
                            <label id="doctor-error"
                                   class="error"
                                   for="doctor"><strong>{{ $errors->first('doctor') }}</strong></label>
                            @endif
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('schedules.patient')</label>
                            <select name="patient" class="form-control show-tick ms select2" data-placeholder="Select">
                                <option></option>
                                @foreach($patients as $patient)
                                <option value="{{$patient->id}}" >{{$patient->name}}
                                </option>
                                @endforeach
                            </select>
                            @if ($errors->has('patient'))
                            <label id="patient-error"
                                   class="error"
                                   for="patient"><strong>{{ $errors->first('patient') }}</strong></label>
                            @endif
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
