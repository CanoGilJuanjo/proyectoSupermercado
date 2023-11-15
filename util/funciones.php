<?php 
    function sqlConexionProyectoSupermercado() {
        $servidor = "localhost";
        $user = "root";
        $contrasena = "medac";
        $baseDeDatos = "proyectoSupermercado";
    
       $conexion = new mysqli($servidor,$user,$contrasena,$baseDeDatos) or die("Error de conexion");
       return $conexion;
    }
    function sqlProductoExistenteId($productoId) {
        $conexion = sqlConexionProyectoSupermercado();
        $sql = "SELECT nombreProducto,idProducto from productos;";
        $resultado = $conexion ->query($sql);
        while($row = $resultado -> fetch_assoc()) {
            if($resultado->num_rows == 0){
                return false;
            }else if($row["idProducto"] == $productoId){
                return true;
            }
        }
        return false;
    }

    function sqlUsuariosExistenteNombre($nombreUsuario){
        $conexion = sqlConexionProyectoSupermercado();
        $sql = "SELECT usuario from usuarios;";
        $resultado = $conexion ->query($sql);
        while($row = $resultado -> fetch_assoc()) {
            if($resultado->num_rows == 0){
                return false;
            }else if($row["usuario"] == $nombreUsuario){
                return true;
            }
        }
        return false;
    }
    function sqlProductoExistenteNombre($productoNombre) {
        $conexion = sqlConexionProyectoSupermercado();
        $sql = "SELECT nombreProducto,idProducto from productos;";
        $resultado = $conexion ->query($sql);
        while($row = $resultado -> fetch_assoc()) {
            if($resultado->num_rows == 0){
                return false;
            }else if($row["nombreProducto"] == $productoNombre){
                return true;
            }
        }
        return false;
    }
?>