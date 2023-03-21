<?php
    include("db.php");
    
    if(isset($_GET['code'])){
        $code = $_GET['code'];
        $query = "SELECT * FROM employees WHERE code = $code;";
        $resultado = mysqli_query($conexion, $query);
        if(!$resultado){
            die("Query Failed");
        }
        if(mysqli_num_rows($resultado) == 1){
            $row = mysqli_fetch_array($resultado);
            $name = $row['name'];
            $surname = $row['surname'];
            $identity = $row['identity'];
            $document = $row['document'];
            $address = $row['address'];
            $telephone = $row['telephone'];
            $photo = $row['photo'];
        }
    }
    if(isset($_POST['actualizar'])){
        $code = $_GET['code'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $identity = $_POST['identity'];
        $document = $_POST['document'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $photo = $_POST['photo'];

        $query = "UPDATE employees set name = '$name',
                                       surname = '$surname',
                                       identity = '$identity',
                                       document = '$document',
                                       address = '$address',
                                       telephone = '$telephone',
                                       photo = '$photo'
                            WHERE code = $code;";
        
        mysqli_query($conexion, $query);
        $_SESSION['message'] = 'Registro actualizado correctamente';
        header("Location: index.php");
    }
?>

<?php include("includes/header.php")?>
    <div class="container p-4">
        <div class="row">
            <div class="card card-body">
                <form action="editar.php?code=<?php echo $_GET['code']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"
                            value="<?php echo $name?>"
                            placeholder="Name" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="surname" class="form-control"
                        value="<?php echo $surname?>"
                            placeholder="Surname" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="identity" class="form-control"
                            value="<?php echo $identity?>"
                            placeholder="Identity" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="document" class="form-control"
                            value="<?php echo $document?>"
                            placeholder="Document" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control"
                            value="<?php echo $address?>"
                            placeholder="Address" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="telephone" class="form-control"
                            value="<?php echo $telephone?>"
                            placeholder="Telephone" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="photo" class="form-control"
                            value="<?php echo $photo?>"
                            placeholder="Photo" autofocus>

                    </div>

                    <input type="submit" class="btn btn-success btn-block"
                        name="actualizar" value="Actualizar"/>

                </form>
            </div>
        </div>
    </div>
<?php include("includes/footer.php")?>
