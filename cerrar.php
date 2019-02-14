<?php  session_start();

       //para cerrar o destruir todo el cookie con la sesión iniciada y redirigir al principal
        session_destroy();
        $_SESSION = array();
        header('location: index.php');
?>
