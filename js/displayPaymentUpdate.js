var currentFileName = window.location.pathname.split('/').pop();

if (currentFileName === "alterar-pagamento-avista.php") {
    document.getElementById("step5-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
} else if (currentFileName === "alterar-curso-avista.php") {
    document.getElementById("step6-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
} else if (currentFileName === "alterar-pagamento-parcelado.php") {
    document.getElementById("step7-container").style.display = "block";
    document.getElementById("step8-container").style.display = "none";
}

