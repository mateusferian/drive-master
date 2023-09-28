                    // Get references to the checkboxes and parcela divs
                    const parceladoNoCarneInput = document.getElementById('parceladoNoCarne');
                    const parceladoNoCartaoInput = document.getElementById('parceladoNoCartao');
                    const parcela1Div = document.getElementById('parcela1');
                    const parcela2Div = document.getElementById('parcela2');
                    const parcela3Div = document.getElementById('parcela3');
                    const parcela4Div = document.getElementById('parcela4');
                    const parcela5Div = document.getElementById('parcela5');
                    const parcela6Div = document.getElementById('parcela6');

                    // Add event listeners to the checkboxes
                    parceladoNoCarneInput.addEventListener('input', toggleParcelaFields);
                    parceladoNoCartaoInput.addEventListener('input', toggleParcelaFields);

                    // Function to toggle the visibility of parcela fields
                    function toggleParcelaFields() {
                        // Check if either input has a value
                        const isParceladoNoCarneChecked = parceladoNoCarneInput.value;
                        const isParceladoNoCartaoChecked = parceladoNoCartaoInput.value;

                        parcela1Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                        parcela2Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                        parcela3Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                        parcela4Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                        parcela5Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                        parcela6Div.style.display = (isParceladoNoCarneChecked || isParceladoNoCartaoChecked) ?
                            'block' : 'none';
                    }