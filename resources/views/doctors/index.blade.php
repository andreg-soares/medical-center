@extends('layouts.main')
@section('title', 'Listagem de medicos')
@section('parentPageTitle', 'Medicos')
@section('content-main')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>Listagem de</strong> Medicos</h2>
            </div>
            <div class="body">
                @if(count($doctors))
                <div class="table-responsive">
                    <div class="table-responsive">
                        <table class="table table-hover js-basic-example">
                            <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CRM</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>CRM</th>
                                <th>Ação</th>
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
                                       onclick="swalDestroy('{{ $doctor->uuid }}', 'cancelar')">
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
                    <strong>Ops !!</strong> Nao ha medicos cadastrados.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script type="application/javascript">
    $(function () {
        $('.js-basic-example').dataTable({
            select: false,
            'language': {
                'lengthMenu': 'Exibindo _MENU_ registros por página',
                'zeroRecords': 'Nenhum registro encontrado',
                'info': 'Exibindo página _PAGE_ de _PAGES_',
                'infoEmpty': 'Nenhum registro disponível.',
                'infoFiltered': 'Filtrado de _MAX_ registros totais',
                'search': 'Pesquise',
                "paginate": {
                    "first": "Primeira",
                    "last": "Ultima",
                    "next": "Próxima",
                    "previous": "Anterior"
                },
            }
        });
    });

    function swalDestroy(){
        Swal.fire({
            title: 'Essa acao sera irreversível',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Ok`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $('#form-destroy').submit()
            }
        })
    }

</script>
@stop
