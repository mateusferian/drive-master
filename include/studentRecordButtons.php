    <?php
    if (isset($_GET["fixa-do-aluno"])) { 


        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Cadastro realizado com sucesso!',
            customClass: {
                popup: 'swalFire',
                icon: 'swalIcon'
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'formulario-de-consulta.php?consulta=$idClient';
        }, 4000);
    </script>";
    }
    else if (isset($_GET["aluno-alterado"])) { 

        echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Alteração realziada com sucesso!',
            customClass: {
                popup: 'swalFire',
                icon: 'swalIcon'
            },
            showConfirmButton: false,
            allowOutsideClick: false  
        });

        setTimeout(function() {
            window.location.href = 'formulario-de-consulta.php?consulta=$idClient';
        }, 4000);
    </script>";
    }
    ?>
