var categoriaRules = {
    descripcion: {
        required: true
    }
};

function initFormCategoria() {
    $("form[name='categoria_form']").validate({
        lang: 'es'
    });

    $('.btn-submit').on('click', function(e) {
        e.preventDefault();
        $("form[name='categoria_form']").submit();
    });

    $("form[name='categoria_form']").on('submit', function(e) {
        if ($(this).valid()) {
            return true;
        } else {
            return false;
        }
    });
}

$(document).ready(function() {

    initFormCategoria();

    addRules(categoriaRules);
});
