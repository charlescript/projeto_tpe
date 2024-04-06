<?php

@session_start();
        
        if(@$_SESSION['nivel_usuario'] != 'admin' OR EMPTY($_SESSION['nivel_usuario']) ){
            session_destroy();
            echo "<script language='javascript'> window.location='../../index.php' </script> ";
        }

        // Feito somente para que ninguém tente burlar através da URL