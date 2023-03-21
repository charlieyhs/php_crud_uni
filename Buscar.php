<?php
    include("db.php");
    
    if(isset($_POST['buscar'])){
        $code = $_POST['code'];
        echo($code);
        $_SESSION['where'] = $code;
    }
    header("Location: index.php");
?>