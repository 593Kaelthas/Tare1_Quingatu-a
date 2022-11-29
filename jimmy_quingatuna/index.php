<?php
//creamos e inicializamos las variables para las cookies
$_nombre_usuario = "";
$_password = "";
$_is_set_recordarme = false;



//verificamos si el user desea conservar cookies  y asignamos
//esto ocurre si escogió RECORDARME, sino no pasa nada
if (isset($_COOKIE["c_recordarme"]) && $_COOKIE["c_recordarme"] !=""){
    //asignamos que sí desea recordar su info de login
    $_is_set_recordarme = true;
   
    //verificamos si el usuario ingreso el nombre
    if (isset($_COOKIE["c_user"])){
        $_nombre_usuario = $_COOKIE["c_user"];
    } else {
        $_nombre_usuario = "";
    }
    //verificamos si el usuario ingreso el password
    if (isset($_COOKIE["c_password"])){
        $_password= $_COOKIE["c_password"];
    } else {
        $_password = "";
    }
    

   
    

    
}
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset = "UTF-8"/> 
    <meta name ="description" content = "Tienda de Productos"/>
    <title>Panel de LogIn Tienda de Productos</title>

    </head>
    <body>
    <h1><b>LogIn</b></h1>
    <form method = "POST" action="panel_principal_es.php">
        <label for="user_name">Usuario:</label><br>
        <input type="text" name = "user" value = "<?php echo $_nombre_usuario?>" required><br>
        <label for="user_password">Password:</label><br>
        <input type="password" name = "password" value = "<?php echo $_password?>" required><br>
        
        <input type="checkbox" name = "chk_recordarme" 
        <?php
            echo ($_is_set_recordarme)?"checked":""
        ?>  
        >
        <label for="user_cookie">Recordarme</label><br>

        <input type="submit" value = "Enviar">
    </form>
    </body>
</html>