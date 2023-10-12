
<?php
if (isset($_GET['etapa'])) {
    $valorRecebido = $_GET['etapa'];
    if ($valorRecebido === "dados-de-cnh") {
?>
        <button type="button" id="avancar-button" class="btn customButton btn-lg" name="save">Avançar</button>
    <?php
    }
}

