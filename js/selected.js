$(document).ready(function() {
    // Function to toggle visibility and required attribute
    function toggleVisibilityAndRequired(selector, isVisible) {
        var element = $(selector);
        element.toggle(isVisible);
        element.find('input').prop('required', isVisible);
    }

    // Event handler for filter change
    $('#filtro').change(function() {
        var selectedOption = $(this).val();

        // Hide all filter sections
        toggleVisibilityAndRequired('.filterCpf', false);
        toggleVisibilityAndRequired('.filterRg', false);
        toggleVisibilityAndRequired('.filterName', false);

        // Show the selected filter section
        if (selectedOption === 'opcao0') {
            toggleVisibilityAndRequired('.filterCpf', true);
        } else if (selectedOption === 'opcao1') {
            toggleVisibilityAndRequired('.filterRg', true);
        } else if (selectedOption === 'opcao2') {
            toggleVisibilityAndRequired('.filterName', true);
        } else if (selectedOption === 'opcao') {
            // Clear all input values when "Sem filtro" is selected
            $('input').val('');
        }
    });
});