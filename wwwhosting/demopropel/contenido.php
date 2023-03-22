<?php

$parametro = @$_GET["pagina"];
$subpagina = @$_GET["subpagina"];
$hacer = @$_GET["hacer"];
switch ($parametro) {
    case "usuarios":
        switch ($subpagina) {
            case "registrar":
                include_once 'partes/usuarios_registrar.php';
                break;
            case "editar":
                include_once 'partes/usuarios_editar.php';
                break;
            case "eliminar":
                include_once 'partes/usuarios_eliminar.php';
                break;
            default:
                include_once 'partes/usuarios_lista.php';
                break;
        }
        break;

    case "productos":
        switch ($subpagina) {
            case "registrar":
                include_once 'partes/productos_registrar.php';
                break;
            case "editar":
                include_once 'partes/productos_editar.php';
                break;
            case "eliminar":
                include_once 'partes/productos_eliminar.php';
                break;
            default:
                include_once 'partes/productos_lista.php';
                break;
        }
        break;

    case "ventas":
        switch ($subpagina) {
            case "registrar":
                include_once 'partes/ventas_registrar.php';
                break;
            case "editar":
                include_once 'partes/ventas_editar.php';
                break;
            case "eliminar":
                include_once 'partes/ventas_eliminar.php';
                break;
            default:
                include_once 'partes/ventas_lista.php';
                break;
        }
        break;
    default:
        include 'pag_dashboard.php';
        break;
}
