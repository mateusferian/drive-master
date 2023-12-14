document.addEventListener("DOMContentLoaded", function () {
    function updateURLParameters(selectedOption) {
        var url = new URL(window.location.href);

        url.searchParams.set('cpf', '');
        url.searchParams.set('rg', '');
        url.searchParams.set('name', '');

        if (selectedOption === 'opcao') {
            url.searchParams.set('filtro', 'opcao');
        } else if (selectedOption === 'opcao0') {
            url.searchParams.set('filtro', 'opcao0');
            url.searchParams.set('cpf', document.getElementById('cpf').value);
        } else if (selectedOption === 'opcao1') {
            url.searchParams.set('filtro', 'opcao1');
            url.searchParams.set('rg', document.getElementById('rg').value);
        } else if (selectedOption === 'opcao2') {
            url.searchParams.set('filtro', 'opcao2');
            url.searchParams.set('name', document.getElementById('name').value);
        }

        window.history.replaceState(null, null, url.toString());
    }

    var filtroSelect = document.getElementById('filtro');
    var filterForm = document.getElementById('opcoes-de-filtragem');

    filtroSelect.addEventListener('change', function () {
        var selectedOption = filtroSelect.value;
        updateURLParameters(selectedOption);
    });

    filterForm.addEventListener('submit', function (event) {
        var selectedOption = filtroSelect.value;
        updateURLParameters(selectedOption);
    });
});

