<?php ob_start(); #esto evita los errores de envios de headers
set_error_handler("var_dump");
include 'connect.php';
session_start(); #inicializamos variables de sesion
 #si esta logueado lo dejo trabajar y sino lo mando al login de nuevo 
 if ( isset( $_SESSION['usuario'] )!='Admin'){
    header("location: " . ROOTPATH . "/modules/login.php");
    die();
} ?>