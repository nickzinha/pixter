$('#formContato').on('submit', function(e){
    e.preventDefault();

    var submit_btn = $('#formContato button');
    var submit_btn_text = submit_btn.val();
    var dados = new FormData($(this)[0]);
    var enviando_formulario = false;

    function volta_submit() {
        submit_btn.removeAttr('disabled');
        submit_btn.val(submit_btn_text);
        enviando_formulario = false;
    }
    $.ajax({
        url:$(this).attr('action'),
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        beforeSend: function(){
            enviando_formulario = true;
            submit_btn.attr('disabled', true);
            submit_btn.val('Enviando...');
            $('.error').remove();
        },
        success: function(data){
            volta_submit();

            $('.contact-notif').html('<p class="alert alert-success">Contato enviado com sucesso!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></p>');

            $('#formContato input, #formContato textarea').val('');
        },
        error: function(data){
            volta_submit();

            $('.contact-notif-').html('<p class="alert alert-success">'+request.responseText+'</p>');

        }

    });
    return false;
});


$('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
});
