<!DOCTYPE html>
<html lang="es">
    <head>
        <!-- Creador: Juanjo Cano Gil -->
        <!-- Fecha de ultima actualizacion:  03-11-2023 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/inicioRegistro.css">
    </head>
    <body>
        <?php 
            require "funciones.php";
            $conexion = sqlConexionProyectoSupermercado();
        ?>
        <div class="container">
            <h1>Inicio de sesion</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="usuario" class="form-label">Usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" name="contrasena" id="" class="form-control">
                </div>
                <input type="submit" value="Iniciar sesion" class="btn btn-primary">
                
            </form>
            <?php 
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $usuario = $_POST["usuario"];
                    $contrasena = $_POST["contrasena"];

                    $sql = "SELECT * from usuarios where usuario = '$usuario'";
                    $resultado = $conexion -> query($sql);
                    
                    
                    $contrasenaCifrada = "";

                    while($fila = $resultado -> fetch_assoc()){
                        $contrasenaCifrada = $fila["contrasena"];
                    }

                    $acceso = password_verify($contrasena, $contrasenaCifrada);
                    
                    if($acceso){
                        echo "Bienvenido ".$usuario;
                        header("location: paginaPrincipal.php");
                        session_start();
                        $_SESSION["usuario"] = $usuario ;
                    }else{
                        echo "<p class='text-danger bg-light p-4 rounded-3'>Error en la contraseña o usuario </p>";
                    }
                }
            ?>
        </div>
    </body>
</html>