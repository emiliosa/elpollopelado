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