document.addEventListener("DOMContentLoaded", function() {
    const avancarButton = document.getElementById("avancar-button");

    avancarButton.style.display = "none";

    setTimeout(function() {
        avancarButton.click();
    },300);
});

