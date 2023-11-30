document.addEventListener("DOMContentLoaded", function() {
    const steps = document.querySelectorAll(".step");

    function updateActiveStep(stepNumber) {
        steps.forEach(function(step, index) {
            step.classList.remove("active-step");

            if (index + 1 === stepNumber) {
                step.classList.add("active-step");
            }
        });

        const fifthElementContainers = [
            "step5-container",
            "step6-container",
            "step7-container",
        ];

        fifthElementContainers.forEach(function(container, index) {
            const containerElement = document.getElementById(container);
            if (containerElement) {
                if (index + 5 === stepNumber) { // Adapta o número do passo para corresponder ao índice correto
                    containerElement.style.display = "block";
                } else {
                    containerElement.style.display = "none";
                }
            }
        });
    }

    const currentFileName = window.location.pathname.split("/").pop();

    const fifthElementFiles = [
        "cadastro-curso-avista.php",
        "cadastro-pagamento-avista.php",
        "cadastro-pagamento-parcelado.php",
    ];

    const fileToStepMapping = {
        "cadastro-de-aluno.php": 1,
        "cadastro-de-cnh.php": 2,
        "cadastro-de-taxa.php": 3,
        "cadastro-de-pagamento.php": 4,
        ...Object.fromEntries(fifthElementFiles.map((file, index) => [file, 5 + index])),
    };

    const stepNumber = fileToStepMapping[currentFileName] || 5;

    updateActiveStep(stepNumber);
});


