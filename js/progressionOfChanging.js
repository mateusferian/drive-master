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
        "alterar-aluno.php": 1,
        "alterar-cnh.php": 2,
        "alterar-taxa.php": 3,
        "alterar-pagamento.php": 4,
        "alterar-pagamento-avista.php": 5,
        "alterar-curso-avista.php": 6,
        "alterar-pagamento-parcelado.php": 7,
    };

    const stepNumber = fileToStepMapping[currentFileName] || 5;

    updateActiveStep(stepNumber);
});
