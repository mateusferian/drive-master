document.addEventListener("DOMContentLoaded", function () {
    const filtroSelect = document.getElementById('filtro');
    const filterCpf = document.querySelector('.filterCpf');
    const filterRg = document.querySelector('.filterRg');
    const filterName = document.querySelector('.filterName');

    // Check if a filter is selected
    const selectedOption = filtroSelect.value;
    showHideFilterFields(selectedOption);

    filtroSelect.addEventListener('change', function () {
        showHideFilterFields(this.value);
    });

    function showHideFilterFields(selectedOption) {
        // Hide all filter fields
        filterCpf.style.display = 'none';
        filterRg.style.display = 'none';
        filterName.style.display = 'none';

        // Show the selected filter field
        if (selectedOption === 'opcao0') {
            filterCpf.style.display = 'block';
        } else if (selectedOption === 'opcao1') {
            filterRg.style.display = 'block';
        } else if (selectedOption === 'opcao2') {
            filterName.style.display = 'block';
        }
    }
});
