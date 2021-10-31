<?php 

function usuario_autenticado(){
    if(!revisar_usuario() ){
        header('location:login.php');
        exit();
    }
}
function revisar_usuario(){
    return isset($_SESSION['usuario']);
}

//este sería el flujo que se ejecuta cuando este archivo se include en otros
session_start();
usuario_autenticado();
?>