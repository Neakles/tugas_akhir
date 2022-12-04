

$(document).on('click', '#btn-edit', function(){
    console.log("ini", $('.modal-body #id-santri').val($(this).data('id')))
    $('.modal-body #id-santri').val($(this).data('id'));
    $('.modal-body #nama').val($(this).data('fullname'));
    $('.modal-body #username').val($(this).data('username'));
    $('.modal-body #email').val($(this).data('email'));
    $('.modal-body #no_tlp').val($(this).data('no_telp'));
    $('.modal-body #gender').val($(this).data('gender')).change();
    $('.modal-body #kamar').val($(this).data('id_kamar'));
    $('.modal-body #wali').val($(this).data('wali'));
    $('.modal-body #no_wali').val($(this).data('no_wali'));
    $('.modal-body #datepicker').val($(this).data('thn_masuk'));
})