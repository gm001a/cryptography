<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AES ENCRYPT</title>
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
                    <h4>Encriptación por AES</h4><br>
                    <form action="c_aes.php" method="POST">
                        <div class="d-inline col-md-6">

                            <label class="" for="">username: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_username" id="txt_username" placeholder="Ingrese nombre de usuario" required>
                            <label class="" for="">password: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_password" id="txt_password" placeholder="Ingrese contraseña" required>
                            <label class="" for="">Llave: </label> 
                            <input class="col-md-3 btn border-success" type="text" name="txt_key" id="txt_key" placeholder="Ingrese su llave de cifrado" required> <p class='text-warning'>no olvide su llave de cifrado</p>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <input type="radio" name="opt_aes" id="opt_aes" value="encrypt" required><label class="col-md-1" for=""> cifrar </label> 
                            <input type="radio" name="opt_aes" id="opt_aes" value="decrypt" required><label class="col-md-2" for=""> descifrar: </label>
                
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
                <div class="bg-ligh">
                    <?php 
                    require_once('./config/conex.php');

                    $sql = "SELECT * FROM tbl_aes";

                    $r = $conn->query($sql);

                    while ($row = mysqli_fetch_ASSOC($r))
                    {
                        echo ("<p class='border'> username: ".$row['vch_username']." password: ".$row ["vch_password"] ."</p>");
                    }?>
                    
                </div>
            </div>
        </div>
    </main>
    <br>
    <br>
</body>
</html>