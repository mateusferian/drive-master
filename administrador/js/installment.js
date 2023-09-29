// Get the checkbox elements for A vista and Curso a vista
const cashCheckbox = document.getElementById('flexCheckCash');
const courseCashCheckbox = document.getElementById('flexCheckCourse');

// Get the payment detail div elements for A vista and Curso a vista
const advancePaymentDiv = document.getElementById('advancePayment');
const courseCashDiv = document.getElementById('advancePayment');

// Add event listeners to checkboxes
cashCheckbox.addEventListener('change', function () {
    if (this.checked) {
        advancePaymentDiv.style.display = 'block';
    } else {
        advancePaymentDiv.style.display = 'none';
    }
});

courseCashCheckbox.addEventListener('change', function () {
    if (this.checked) {
        courseCashDiv.style.display = 'block';
    } else {
        courseCashDiv.style.display = 'none';
    }
});

// Get the checkbox element for Parcelamento
const installmentCheckbox = document.getElementById('installment');

// Get all the payment detail div elements for Parcelamento
const installmentDivs = [
    document.getElementById('paymentDueDate'),
    document.getElementById('firstPaymentInstallment'),
    document.getElementById('secondPaymentInstallment'),
    document.getElementById('thirdPaymentInstallment'),
    document.getElementById('fourthPaymentInstallment'),
    document.getElementById('fifthPaymentInstallment'),
    document.getElementById('sixthPaymentInstallment')
];

// Add an event listener to the Parcelamento checkbox
installmentCheckbox.addEventListener('change', function () {
    if (this.checked) {
        // If checked, display all installment divs
        installmentDivs.forEach(div => {
            div.style.display = 'block';
        });
    } else {
        // If unchecked, hide all installment divs
        installmentDivs.forEach(div => {
            div.style.display = 'none';
        });
    }
});



