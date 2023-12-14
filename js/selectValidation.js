function validateCategory() {
    var selectedCategory = document.getElementById("category").value;
    var categoryValidationMessage = document.getElementById(
        "categoryValidationMessage");

    if (!selectedCategory) {
        categoryValidationMessage.textContent =
            "Selecione uma opção válida.";
    } else {
        categoryValidationMessage.textContent = "";
    }
}

function validateinstallmentMode(i) {
    var selectedCategory = document.getElementById("installmentMode" + i).value;
    var categoryValidationMessage = document.getElementById("categoryValidationMessage");

    if (!selectedCategory) {
        categoryValidationMessage.textContent = "Selecione uma opção válida para a parcela " + i + ".";
    } else {
        categoryValidationMessage.textContent = "";
    }
}

function validatePaymentStatus(i) {
    var selectedCategory = document.getElementById("paymentStatus" + i).value;
    var categoryValidationMessage = document.getElementById("categoryValidationMessage");

    if (!selectedCategory) {
        categoryValidationMessage.textContent = "Selecione uma opção válida para a parcela " + i + ".";
    } else {
        categoryValidationMessage.textContent = "";
    }
}