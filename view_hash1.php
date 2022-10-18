<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASHV1 ENCRYPT</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <?php include("./interface/header.html") ?>
    </header>

    <br><br>
    
    <main class="container">
        <div class="card">
            <div class="card bg-light">
                <div>
                    <h4>Encriptación por HASH V1</h4><br>
                    <p>Encripta contraseña o compara si su clave es correcta</p>
                    <form action="c_hash1.php" method="POST">
                        <div class="d-inline col-md-6">
                        <label class="" for="">usuario: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_username" id="txt_username" placeholder="usuario" required>
                            <label class="" for="">contraseña: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_password" id="txt_password" placeholder="Ingrese contraseña" required>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <input type="radio" name="opt_hash1" id="opt_hash1" value="encrypt" required><label class="col-md-1" for=""> cifrar </label> 
                            <input type="radio" name="opt_hash1" id="opt_hash1" value="verify" required><label class="col-md-2" for=""> verificar: </label>
                
                        </div>
                        <div><br>
                            <button class="btn col-md-8 bg-success text-white">Enviar</button>            
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <div class="card bg-light">
                <h4>Resultado</h4>
                <br>
                <?php 
                    require_once('./config/conex.php');

                    $sql = "SELECT * FROM tbl_hash1";

                    $r = $conn->query($sql);

                    while ($row = mysqli_fetch_ASSOC($r))
                    {
                        echo ("<p class='border'> username: ".$row['vch_username']." password: ".$row ["vch_password"] ."</p>");
                    }?>
            </div>
        </div>
    </main>
</body>
</html>