// override jquery validate plugin defaults
$.validator.setDefaults({
    highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
    },
    unhighlight: function(element) {
        $(element).closest('.form-group').removeClass('has-error');
    },
    errorElement: 'span',
    errorClass: 'help-block',
    errorPlacement: function(error, element) {
        if (element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$.validator.addMethod("cuit", function(value) {
    if (!/^\d{2}-\d{8}-\d{1}$/.test(value)) {
        return false;
    }
    var aMult = '5432765432';
    var aMult = aMult.split('');
    var sCUIT = value.replace(/-/g, "").replace(/_/g, "").replace(/ /g, "");
    if (sCUIT && sCUIT != 0 && sCUIT.length == 11) {
        var aCUIT = sCUIT.split('');
        var iResult = 0;
        for (i = 0; i <= 9; i++) {
            iResult += aCUIT[i] * aMult[i];
        }
        iResult = (iResult % 11);
        iResult = 11 - iResult;
        if (iResult == 11) {
            iResult = 0;
        }
        if (iResult == 10) {
            iResult = 9;
        }
        if (iResult == aCUIT[10]) {
            return true;
        }
    }
    return false;
}, "Formato de CUIL incorrecto");

$.validator.addMethod("texto", function(value) {
    if (!/^[a-zA-Z ]*$/.test(value)) {
        return false;
    }
    return true;
}, "Formato incorrecto, solamente se acepta texto");

$.validator.addMethod("razonSocial", function(value) {
    if (!/.*[a-zA-Z].*/.test(value)) {
        return false;
    }
    return true;
}, "Formato incorrecto, el texto debe contener alguna letra");

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        weekStart: 01,
        startDate: "now",
        todayBtn: "linked",
        language: "es",
        orientation: "bottom left",
        daysOfWeekHighlighted: "0,6",
        autoclose: true,
        todayHighlight: true
    });
});
