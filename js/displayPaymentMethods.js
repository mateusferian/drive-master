var currentFileName = window.location.pathname.split('/').pop();

// Verifica se o nome do arquivo é igual a "pagamento.html"
if (currentFileName === "cadastro-pagamento-avista.php") {
    // Mostra a quinta etapa
    document.getElementById("step5-container").style.display = "block";
}
if (currentFileName === "cadastro-curso-avista.php") {
    // Mostra a quinta etapa
    document.getElementById("step6-container").style.display = "block";
}
if (currentFileName === "cadastro-pagamento-parcelado.php") {
    // Mostra a quinta etapa
    document.getElementById("step7-container").style.display = "block";
}