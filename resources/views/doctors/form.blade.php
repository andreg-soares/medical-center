@extends('layouts.main')
@section('title', 'Formulario de medico')
@section('parentPageTitle', 'Medicos')
@section('content-main')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="header">
                    @if(isset($doctor))
                        <h2><strong>@lang('index.edit')</strong> @lang('doctors.doctor')</h2>
                    @else
                        <h2><strong>@lang('index.create')</strong> @lang('doctors.doctor')</h2>
                    @endif
                </div>
                <div class="body">
                    <form action="
                    @if(!isset($doctor))
                    {{route('doctors.store')}}
                    @else
                    {{route('doctors.update',$doctor->uuid)}}
                    @endif" method="post">

                        @csrf
                        @if(isset($doctor))
                            @method('PATCH')
                        @endif
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.name')</label>
                                <div class="input-group masked-input">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-face"></i></span>
                                    </div>
                                    <input type="text" name="name" value="{{!isset($doctor)?old('name'):$doctor->name}}"
                                           class="form-control" placeholder="@lang('doctors.name')">
                                    @if ($errors->has('name'))
                                        <label id="name-error"
                                               class="error"
                                               for="name"><strong>{{ $errors->first('name') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.email')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-email"></i></span>
                                    </div>
                                    <input type="email" name="email"
                                           value="{{!isset($doctor)?old('email'):$doctor->email}}"
                                           class="form-control email" placeholder="@lang('doctors.email')">
                                    @if ($errors->has('email'))
                                        <label id="email-error"
                                               class="error"
                                               for="email"><strong>{{ $errors->first('email') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.cellphone')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-phone"></i></span>
                                    </div>
                                    <input type="text" name="cellphone"
                                           value="{{!isset($doctor)?old('cellphone'):$doctor->cellphone}}"
                                           class="form-control mobile-phone-number"
                                           placeholder="@lang('doctors.cellphone')">
                                    @if ($errors->has('cellphone'))
                                        <label id="cellphone-error"
                                               class="error"
                                               for="cellphone"><strong>{{ $errors->first('cellphone') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.cpf')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="cpf" value="{{!isset($doctor)?old('cpf'):$doctor->cpf}}"
                                           class="form-control cpf" placeholder="@lang('doctors.cpf')">
                                    @if ($errors->has('cpf'))
                                        <label id="cpf-error"
                                               class="error"
                                               for="cpf"><strong>{{ $errors->first('cpf') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.crm')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="crm" value="{{!isset($doctor)?old('crm'):$doctor->crm}}"
                                           class="form-control crm" placeholder="@lang('doctors.crm')">
                                    @if ($errors->has('crm'))
                                        <label id="crm-error"
                                               class="error"
                                               for="crm"><strong>{{ $errors->first('crm') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="divider col-lg-12 col-md-12">
                                <p>Endereço</p>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.postcode')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="postcode" id="postcode"
                                           value="{{!isset($doctor)?old('postcode'):$doctor->address->postcode}}"
                                           class="form-control postcode" placeholder="@lang('doctors.postcode')">
                                    @if ($errors->has('postcode'))
                                        <label id="postcode-error"
                                               class="error"
                                               for="postcode"><strong>{{ $errors->first('postcode') }}</strong></label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.street')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="street" id="street"
                                           value="{{!isset($doctor)?old('street'):$doctor->address->street}}"
                                           class="form-control" placeholder="@lang('doctors.street')" {{!isset($doctor)?'':'readonly'}}>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.number_home')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="number_home" id="number_home"
                                           value="{{!isset($doctor)?old('number_home'):$doctor->number_home}}"
                                           class="form-control" placeholder="@lang('doctors.number_home')">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.complement')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="complement" id="complement"
                                           value="{{!isset($doctor)?old('complement'):$doctor->complement}}"
                                           class="form-control" placeholder="@lang('doctors.complement')">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.neighborhood')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="neighborhood" id="neighborhood"
                                           value="{{!isset($doctor)?old('neighborhood'):$doctor->address->neighborhood}}"
                                           class="form-control" placeholder="@lang('doctors.neighborhood')" {{!isset($doctor)?'':'readonly'}}>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.city')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="city" id="city"
                                           value="{{!isset($doctor)?old('city'):$doctor->address->city}}"
                                           class="form-control" placeholder="@lang('doctors.city')" {{!isset($doctor)?'':'readonly'}}>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6">
                                <label>@lang('doctors.uf')</label>
                                <div class="input-group masked-input mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-assignment"></i></span>
                                    </div>
                                    <input type="text" name="uf" id="uf"
                                           value="{{!isset($doctor)?old('uf'):$doctor->address->uf}}"
                                           class="form-control" placeholder="@lang('doctors.uf')" {{!isset($doctor)?'':'readonly'}}>
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
