<?php
        session_start();
        if((!isset($_SESSION['name'])) and (!isset($_SESSION['email']))){
            echo "<script language=javascript>
            alert('ALERTA, VOCÊ NÃO TEM PERMISSÃO!');
            location.href = 'index.php';
            </script>";
            
        }
?>