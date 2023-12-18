var currentFileName = window.location.pathname.split('/').pop();

if (currentFileName === "cadastro-pagamento-avista.php") {
    document.getElementById("step5-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
} else if (currentFileName === "cadastro-curso-avista.php") {
    document.getElementById("step6-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
} else if (currentFileName === "cadastro-pagamento-parcelado.php") {
    document.getElementById("step7-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
}

