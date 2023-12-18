$(document).ready(function () {
    // Adiciona um ouvinte de evento ao botão X no cabeçalho
    $("#fecharModalBtn").on("click", function () {
        // Fecha o modal usando o método modal('hide')
        $("#notificationModal").modal('hide');
    });

    // Adiciona um ouvinte de evento ao botão no rodapé
    $("#fecharModalFooterBtn").on("click", function () {
        // Fecha o modal usando o método modal('hide')
        $("#notificationModal").modal('hide');
    });
});