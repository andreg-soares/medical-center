@extends('layouts.main')
@section('title', 'Formulario de paciente')
@section('parentPageTitle', 'Pacientes')
@section('content-main')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="card">
            <div class="header">
                @if(isset($patient))
                <h2><strong>@lang('index.edit')</strong> @lang('patients.patient')</h2>
                @else
                <h2><strong>@lang('index.create')</strong> @lang('patients.patient')</h2>
                @endif
            </div>
            <div class="body">
                <form action="
                    @if(!isset($patient))
                    {{route('patients.store')}}
                    @else
                    {{route('patients.update',$patient->uuid)}}
                    @endif" method="post">

                    @csrf
                    @if(isset($patient))
                    @method('PATCH')
                    @endif
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.name')</label>
                            <div class="input-group masked-input">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-face"></i></span>
                                </div>
                                <input type="text" name="name" value="{{!isset($patient)?old('name'):$patient->name}}"
                                       class="form-control" placeholder="@lang('patients.name')">
                                @if ($errors->has('name'))
                                <label id="name-error"
                                       class="error"
                                       for="name"><strong>{{ $errors->first('name') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.email')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                </div>
                                <input type="email" name="email"
                                       value="{{!isset($patient)?old('email'):$patient->email}}"
                                       class="form-control email" placeholder="@lang('patients.email')">
                                @if ($errors->has('email'))
                                <label id="email-error"
                                       class="error"
                                       for="email"><strong>{{ $errors->first('email') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.cellphone')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                </div>
                                <input type="text" name="cellphone"
                                       value="{{!isset($patient)?old('cellphone'):$patient->cellphone}}"
                                       class="form-control mobile-phone-number"
                                       placeholder="@lang('patients.cellphone')">
                                @if ($errors->has('cellphone'))
                                <label id="cellphone-error"
                                       class="error"
                                       for="cellphone"><strong>{{ $errors->first('cellphone') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.cpf')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="cpf" value="{{!isset($patient)?old('cpf'):$patient->cpf}}"
                                       class="form-control cpf" placeholder="@lang('patients.cpf')">
                                @if ($errors->has('cpf'))
                                <label id="cpf-error"
                                       class="error"
                                       for="cpf"><strong>{{ $errors->first('cpf') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="divider col-lg-12 col-md-12">
                            <p>Endereço</p>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.postcode')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="postcode" id="postcode"
                                       value="{{!isset($patient)?old('postcode'):$patient->address->postcode}}"
                                       class="form-control postcode" placeholder="@lang('patients.postcode')">
                                @if ($errors->has('postcode'))
                                <label id="postcode-error"
                                       class="error"
                                       for="postcode"><strong>{{ $errors->first('postcode') }}</strong></label>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.street')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="street" id="street"
                                       value="{{!isset($patient)?old('street'):$patient->address->street}}"
                                       class="form-control" placeholder="@lang('patients.street')" {{!isset($patient)?'':'readonly'}}>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.number_home')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="number_home" id="number_home"
                                       value="{{!isset($patient)?old('number_home'):$patient->number_home}}"
                                       class="form-control" placeholder="@lang('patients.number_home')">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.complement')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="complement" id="complement"
                                       value="{{!isset($patient)?old('complement'):$patient->complement}}"
                                       class="form-control" placeholder="@lang('patients.complement')">
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.neighborhood')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="neighborhood" id="neighborhood"
                                       value="{{!isset($patient)?old('neighborhood'):$patient->address->neighborhood}}"
                                       class="form-control" placeholder="@lang('patients.neighborhood')" {{!isset($patient)?'':'readonly'}}>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.city')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="city" id="city"
                                       value="{{!isset($patient)?old('city'):$patient->address->city}}"
                                       class="form-control" placeholder="@lang('patients.city')" {{!isset($patient)?'':'readonly'}}>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6">
                            <label>@lang('patients.uf')</label>
                            <div class="input-group masked-input mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                </div>
                                <input type="text" name="uf" id="uf"
                                       value="{{!isset($patient)?old('uf'):$patient->address->uf}}"
                                       class="form-control" placeholder="@lang('patients.uf')" {{!isset($patient)?'':'readonly'}}>
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
<script type="application/javascript">
    $('#postcode').on('change', function () {
        var cep = $('#postcode').val();
        axios.post('{{route('dashboard.postcode')}}', {
            'postcode': cep
        }, {
            headers: {
                'Authorization': '{{ Session::token() }}'
            }
        }).then(value => {
            if (!value.data.erro) {
                $('#city').val(value.data.localidade).prop( "readonly", true );
                $('#street').val(value.data.logradouro).prop( "readonly", true );
                $('#neighborhood').val(value.data.bairro).prop( "readonly", true );
                $('#uf').val(value.data.uf).prop( "readonly", true );
            }else{
                $('#uf').val('').prop( "readonly", false );
                $('#neighborhood').val('').prop( "readonly", false );
                $('#city').val('').prop( "readonly", false );
                $('#street').val('').prop( "readonly", false );
            }
        })
    })
</script>

@stop
