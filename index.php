<?php include("db.php")?>
<?php include("includes/header.php")?>
    <h1>CRUD</h1>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php if(isset($_SESSION['message'])) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>

                    </button>
                </div>
            
            <?php session_unset(); }?>

            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control"
                            placeholder="Name" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="surname" class="form-control"
                            placeholder="Surname" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="identity" class="form-control"
                            placeholder="Identity" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="document" class="form-control"
                            placeholder="Document" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="address" class="form-control"
                            placeholder="Address" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="telephone" class="form-control"
                            placeholder="Telephone" autofocus>

                    </div>

                    <div class="form-group">
                        <input type="text" name="photo" class="form-control"
                            placeholder="Photo" autofocus>

                    </div>

                    <input type="submit" class="btn btn-success btn-block"
                        name="guardar" value="guardar"/>

                </form>
            </div>
        </div>
        <div class="col-md-8">
         <table class="table table-bordered">
                    
                    <thead>
                    <form action="Buscar.php" method="POST">
                        <tr>


                            <td>
                                <input type="text" class="form-control"
                                    name="code" placeholder="code"/>
                            </td>
                            <td> 
                            <input type="submit" class="btn btn-secondary"
                                name="buscar" value="buscar"/>
                                
                            </td>
                        </tr>
                    </form>
                        <tr>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Identity</th>
                            <th>Document</th>
                            <th>Address</th>
                            <th>Telephone</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $query = "SELECT * FROM employees;";
                            if(isset($_SESSION['where'])) {
                                $codeWhere = $_SESSION['where'];
                                $query =  "SELECT * FROM employees WHERE code = $codeWhere;";
                            }

                            
                            $resultado = mysqli_query($conexion,$query);
                            while($row = mysqli_fetch_array($resultado)){?>
                                <tr>
                                    <td><?php echo $row['name']?></td>
                                    <td><?php echo $row['surname']?></td>
                                    <td><?php echo $row['identity']?></td>
                                    <td><?php echo $row['document']?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['telephone']?></td>
                                    <td>
                                        <a class="btn btn-secondary" href="editar.php?code=<?php echo$row['code'];?>"><i class="fas fa-marker"></i></a>
                                        <a class="btn btn-danger" href="eliminar.php?code=<?php echo$row['code'];?>"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php session_unset();} ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>