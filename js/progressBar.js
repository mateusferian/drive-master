document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".step");

    function updateActiveStep(stepNumber) {
        steps.forEach(function(step, index) {
            step.classList.remove("active-step");

            if (index + 1 === stepNumber) {
                step.classList.add("active-step");
            }
        });
    }

    const currentFileName = window.location.pathname.split("/").pop();

    const fileToStepMapping = {
        "cadastro-de-aluno.php": 1,
        "cadastro-de-cnh.php": 2,
        "cadastro-de-taxa.php": 3,
        "cadastro-de-pagamento.php": 4,
        "cadastro-pagamento-avista.php": 5,
        "cadastro-curso-avista.php": 6,
        "cadastro-pagamento-parcelado.php": 7,
    };

    const stepNumber = fileToStepMapping[currentFileName] || 5;

    updateActiveStep(stepNumber);
});
