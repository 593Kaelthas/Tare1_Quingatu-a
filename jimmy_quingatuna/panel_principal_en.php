<?php
session_start();

//verificamos si se inicio sesión previamente
if(!isset($_SESSION["s_user"]) && !isset($_SESSION["s_password"])){
    header("Location: index.php");
} else {
    
    if(isset($_GET)) {
    
        if($_GET["language"]==1) {
            //Cambio de idioma
            setcookie("c_language", "en",0);
        } else {
            $_language = "es";
            setcookie("c_language", "es",0);
        }
    }
    
    
    
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
        setcookie("c_language","en",time()+(60*60*24*30));
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
        <a href="panel_principal_en.php">EN (English)</a>
        <br>
        <a href="cerrar_sesion.php">Cerrar Sesión</a>
        <br>
        <h3><b>Product List</b></h3>
        <?php
           
                $archivo = fopen('categorias_en.txt','r');
                while ($linea = fgets($archivo)) {
                echo $linea.'<br/>';
                }
                fclose($archivo);
            
            

        ?>
    </body>
</html>