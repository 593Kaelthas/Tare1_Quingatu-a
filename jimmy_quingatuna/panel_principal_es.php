<?php

//inicializa el motor de sesiones y cookies en el servidor
session_start();
$_language = "es"; //asignamos por defecto el idioma español




//una vez iniciada la sesion, asignamos los valores en $_SESSION
if(isset($_POST["user"]) && isset($_POST["password"])){
    $_SESSION["s_user"] = $_POST["user"];
    $_SESSION["s_password"] = $_POST["password"];
    
    
    //asignamos los datos que recibimos en POST en las variables creadas
    $_nombre_usuario = $_POST["user"];
    $_password = $_POST["password"];
}

//verificamos si se inicio sesión previamente
if(!isset($_SESSION["s_user"]) && !isset($_SESSION["s_password"])){
    header("Location: index.php");
} else {
    //verificamos que el chk Recordarme este pulsado
    if (isset($_POST["chk_recordarme"])){
    
    $_save_recordarme = $_POST["chk_recordarme"]; //asigna "on"
    
    //nombre de la cokie, valor de la cokie y el tiempo de expiración
    setcookie("c_user", $_nombre_usuario, time()+(60*60*24*30));
    setcookie("c_password", $_password, time()+(60*60*24*30));
    setcookie("c_recordarme",$_save_recordarme,time()+(60*60*24*30));
    setcookie("c_language", $_language,time()+(60*60*24*30));
} else {
    $_save_recordarme ="";
    $_is_set_recordarme = false;
    setcookie("c_user", "");
    setcookie("c_password","");
    setcookie("c_recordarme","");
    setcookie("c_language",$_language);
}
}






?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8"/> 
        <title>Menu Principal Tienda de Productos en Español</title>
    </head>
    <body>
        <h1><b>Panel Principal</b></h1><br>
        <h2>Bienvenido Usuario:<?php echo $_SESSION["s_user"] ?></h2>
        <hr>
        <a href="panel_principal_es.php">ES (Español)|</a>
        <a href="panel_principal_en.php?language=1">EN (English)</a>
        <br>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
        <br>
        <h3><b>Product List</b></h3>
        <?php
            if ($_language == "es"){
                $archivo = fopen('categorias_es.txt','r');
                while ($linea = fgets($archivo)) {
                echo $linea.'<br/>';
                }
                fclose($archivo);}
            else {
                $archivo = fopen('categorias_en.txt','r');
                while ($linea = fgets($archivo)) {
                echo $linea.'<br/>';
                }
                fclose($archivo);
            }
            

        ?>
    </body>
</html>
