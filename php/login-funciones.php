<?php
include('php/funciones.php');



function login(){
if(isset($_POST['ingreso']))
{
    
    $usuario=$_POST['usuario'];
    $pass=$_POST['pass'];

    $consulta ="SELECT count(*) as cantidad, nombre_usuario, pass, perfil_nombre FROM usuarios INNER JOIN perfiles ON id_perfil=rela_perfil WHERE nombre_usuario ='".$usuario."' AND pass='".$pass."';";

    $matrizconsulta = consulta($consulta);
    
    if($matrizconsulta[0]['cantidad'] > 0) {
        echo "<script>alert('Bienvenido');</script>";
        $perfil = $matrizconsulta[0]['perfil_nombre'];
        guardar_usuario($perfil);
        if ($perfil == 'Administrador') {

            header('location: Administrador/index.php');
        }   elseif($perfil == 'Usuario') {

            header('location: index.php');
        }
    }
    else
    {
        echo "<script>alert('Usuario o contraseña incorrectos')</script>";
    }
}
}


    
?>
