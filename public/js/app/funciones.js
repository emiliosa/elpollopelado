/**
 * @param {HTMLSelect} select
 * @param {Object} newOpts
 * @param {(string|number)} [selectedValue]
 * @param {boolean} [keepFirst=false]
 */
function loadSelectOptions(select, newOpts, selectedValue, keepFirst) {
    var options = select.options, value, selected, text;

    // Dump current options
    options.length = (keepFirst ? 1 : 0);

    // Add new options
    for (text in newOpts) {
        value = newOpts[text];
        selected = (selectedValue == value);
        options[options.length] = new Option(text, value, selected, selected);
    }
}

/**
 *
 * @param {HTMLInput} input
 */
function readURL(input, output) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + output.id).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/**
 *
 * @param {array} rulesObj
 */
function addRules(rulesObj) {
    for (var item in rulesObj) {
        $('#' + item).rules('add', rulesObj[item]);
    }
}

/**
 *
 * @param {array} rulesObj
 */
function removeRules(rulesObj) {
    for (var item in rulesObj) {
        $('#' + item).rules('remove');
    }
}
