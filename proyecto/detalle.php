<?php
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    require_once "conexion.php";
    
    
    $sql = "SELECT * FROM estudiantes WHERE id = :id";
    
    if($stmt = $pdo->prepare($sql)){
     
        $stmt->bindParam(":id", $param_id);
        
      
        $param_id = trim($_GET["id"]);
        
       
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
                $name = $row["dni"];
                $address = $row["nombre"];
                $salary = $row["apellido"];
            } else{
                header("location: index.php");
                exit();
            }
            
        } else{
            echo "Lo sentimos! Algo anduvo mal. Por Favor intenta nuevamente.";
        }
    }
     
   
    unset($stmt);
    
   
    unset($pdo);
} else{
    header("location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
     
    </style>
</head>
<body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Registro</h1>
                    <div class="form-group">
                        <label class="h3">DNI</label>
                        <p><?php echo $row["dni"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="h3">Nombre</label>
                        <p><?php echo $row["nombre"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label class="h3">Apellido</label>
                        <p><?php echo $row["apellido"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-dark">Volver</a></p>
                </div>
            </div>        
        </div>
</body>
</html>