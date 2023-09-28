const checkboxes = document.querySelectorAll('input[name="installmentType"]');
const firstPaymentInstallmentDiv = document.getElementById('firstPaymentInstallment');
const secondPaymentInstallmentDiv = document.getElementById('secondPaymentInstallment');
const thirdPaymentInstallmentDiv = document.getElementById('thirdPaymentInstallment');
const fourthPaymentInstallmentDiv = document.getElementById('fourthPaymentInstallment');
const fifthPaymentInstallmentDiv = document.getElementById('fifthPaymentInstallment');
const sixthPaymentInstallmentDiv = document.getElementById('sixthPaymentInstallment');
const advancePaymentDiv = document.getElementById('advancePayment');

checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', toggleInstallmentFields);
});

function toggleInstallmentFields() {
    const isFirstPaymentInstallmentChecked = checkboxes[0].checked;
    const isSecondPaymentInstallmentChecked = checkboxes[1].checked;
    const isThirdPaymentInstallmentChecked = checkboxes[2].checked;
    const isFourthPaymentInstallmentChecked = checkboxes[3].checked;
    
    firstPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    secondPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    thirdPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    fourthPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    fifthPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    sixthPaymentInstallmentDiv.style.display = (isSecondPaymentInstallmentChecked || isThirdPaymentInstallmentChecked) ? 'block' : 'none';
    advancePaymentDiv.style.display = (isFirstPaymentInstallmentChecked || isFourthPaymentInstallmentChecked) ? 'block' : 'none';
}
