<?php 
    include("db.php");
    if(isset($_POST['guardar'])){
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $identity = $_POST['identity'];
        $document = $_POST['document'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $photo = $_POST['photo'];

        $query = "INSERT INTO employees(name,surname,identity,document,address,telephone,photo)
                    VALUES ('$name', '$surname', '$identity', '$document', '$address', '$telephone','$photo')";

        $result = mysqli_query($conexion, $query);

        if(!$result){
            die("QUERY FAILED!");
        }

        $_SESSION['message'] = 'Empleado Creado!';
        $_SESSION['message_type'] = 'success';

        header("Location: index.php");
    }


?>