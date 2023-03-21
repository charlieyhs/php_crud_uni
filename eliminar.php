<?php 
    include("db.php");

    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $query = "DELETE FROM employees WHERE code = $code;";
        
        $resultado = mysqli_query($conexion, $query);

        if(!$resultado){
            die("Query Failed");
        }
        $_SESSION['message'] = 'Empleado Eliminado';
        header("Location: index.php");
    }
?>