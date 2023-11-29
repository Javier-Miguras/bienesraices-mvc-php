<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES',$_SERVER['DOCUMENT_ROOT'] . '/imagenes/');



function incluirTemplate($nombre, $inicio = false){
    include TEMPLATES_URL . "/{$nombre}.php";
}

function estaAutenticado() {
    session_start();

    if(!$_SESSION['login']){
        header('Location: /');
    }
    
}

function debuguear($variable){
    echo "<pre>";
        var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa / sanitiza el HTML

function s($html) : string{
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido

function validarTipoContenido($tipo){
    $tipos = ['propiedad', 'vendedor'];

    return in_array($tipo, $tipos);  //in_array(lo que busca, donde lo busca)
}

//Muestra los mensajes

function mostrarNotificacion($codigo){
    $mensaje = '';
    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;
        case 2:
            $mensaje = 'Actualizado correctamente';
            break;
        case 3:
            $mensaje = 'Eliminado correctamente';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}

function validarORedireccionar( string $url){
    //Validar la URL  por id valido (int)

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: {$url}");
    }

    return $id;
}