
$(document).ready(function () {
    // Esconde todos os campos de filtro inicialmente
    $(".filterCpf, .filterRg, .filterName, .openParcelFilter, .filterRealizedParcels").hide();

    // Quando o valor do select é alterado
    $("select[name='filtro']").change(function () {
        // Esconde todos os campos de filtro
        $(".filterCpf, .filterRg, .filterName, .openParcelFilter, .filterRealizedParcels").hide();

        // Obtém o valor selecionado
        var filtroSelecionado = $(this).val();

        // Mostra o campo de filtro relevante com base na seleção
        if (filtroSelecionado === "opcao0") {
            $(".filterCpf").show();
        } else if (filtroSelecionado === "opcao1") {
            $(".filterRg").show();
        } else if (filtroSelecionado === "opcao2") {
            $(".filterName").show();
        } else if (filtroSelecionado === "opcao3") {
            $(".openParcelFilter").show();
        } else if (filtroSelecionado === "opcao4") {
            $(".filterRealizedParcels").show();
        }
    });
})
