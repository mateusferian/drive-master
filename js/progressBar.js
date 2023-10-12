document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".step");

    function updateActiveStep(stepNumber) {
        steps.forEach(function(step, index) {
            if (index + 1 === stepNumber) {
                step.classList.add("active-step");
            } else {
                step.classList.remove("active-step");
            }
        });
    }

    const currentFileName = window.location.pathname.split("/").pop();

 
    const fileToStepMapping = {
        "cadastro-de-aluno.php": 1,
        "cadastro-de-cnh.php": 2,
        "cadastro-de-taxa.php": 3,
        "cadastro-de-pagamento.php": 4
    };


    const stepNumber = fileToStepMapping[currentFileName];

    if (stepNumber) {
        updateActiveStep(stepNumber);
    }
});

