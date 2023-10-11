document.addEventListener("DOMContentLoaded", function() {
    const avancarButton = document.getElementById("avancar-button");
    const avancar2Button = document.getElementById("avancar-2-button");
    const avancar3Button = document.getElementById("avancar-3-button");
    const form1 = document.getElementById("form1");
    const form2 = document.getElementById("form2");
    const form3 = document.getElementById("form3");
    const form4 = document.getElementById("form4");

    const steps = document.querySelectorAll(".step");

    avancarButton.addEventListener("click", function() {
        form1.style.display = "none";
        form2.style.display = "block";
        updateActiveStep(2); // Atualize a etapa ativa para 2
    });

    avancar2Button.addEventListener("click", function() {
        form2.style.display = "none";
        form3.style.display = "block";
        updateActiveStep(3); // Atualize a etapa ativa para 3
    });

    avancar3Button.addEventListener("click", function() {
        form3.style.display = "none";
        form4.style.display = "block";
        updateActiveStep(4); // Atualize a etapa ativa para 4
    });

    function updateActiveStep(stepNumber) {
        steps.forEach(function(step, index) {
            if (index + 1 === stepNumber) {
                step.classList.add("active-step");
            } else {
                step.classList.remove("active-step");
            }
        });
    }
});