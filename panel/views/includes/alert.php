<?php

if(isset($_SESSION["alert"])){

    $alert = $_SESSION["alert"];

    unset($_SESSION["alert"]);

    ?>

    <script>

        $(document).ready(function () {

            swal({
                title: '<?php echo $alert["title"]; ?>',
                text: '<?php echo $alert["text"]; ?>',
                type: '<?php echo $alert["type"]; ?>',
                confirmButtonText: 'Tamam'
            })

        })

    </script>

<?php  } ?>

