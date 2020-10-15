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


    //Masked Input =========
    var $demoMaskedInput = $('.masked-input');

    //Email
    $demoMaskedInput.find('.email').inputmask({ alias: "email" });

    //Mobile Phone Number
    $demoMaskedInput.find('.mobile-phone-number').inputmask('(99) 99999-9999', { placeholder: '(__) _____-____' });

    //Mobile Phone Number
    $demoMaskedInput.find('.crm').inputmask('99999-AA', { placeholder: '_____-__' });

    //Mobile Phone Number
    $demoMaskedInput.find('.cpf').inputmask('999.999.999-99', { placeholder: '___.___.___-__' });

    $demoMaskedInput.find('.postcode').inputmask('99999-999', { placeholder: '_____-__' });
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

