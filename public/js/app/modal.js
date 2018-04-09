$(document).ready(function(){
    $('.lnk-borrar').on('click', function(e){
        e.preventDefault();
        $("form[name='delete_modal_form']").attr('action', $(this).attr('href'));
        $('.modal-delete-confirm').modal('show');
    });
    $('.btn-modal-borrar').on('click', function(e){
        e.preventDefault();
        $("form[name='delete_modal_form']").submit();
    });
});
