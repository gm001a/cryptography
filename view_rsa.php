<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RSA ENCRYPT</title>
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
            <h4>Encriptación por RSA</h4><br>
            <div class="card bg-light">
                <div>
                    <h4>Encriptar por RSA</h4><br>   
                    <form action="c_rsa.php" method="POST">
                        <input type="hidden" name="type_rsa" id="type_rsa" value="encrypt">
                        <div class="d-inline col-md-6">
                            <label class="" for="">usuario: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_username" id="txt_username" placeholder="Ingrese nombre de usuario" required>
                            <label class="" for="">contraseña: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_password" id="txt_password" placeholder="Ingrese contraseña" required>
                        </div>
                        <br>
                        <div><br>
                            <button class="btn col-md-4 bg-success text-white">Enviar</button>            
                        </div>
                    </form>
                </div>
                <hr>
                <!--<h4>Resultado</h4>-->
                <div class="bg-ligh">
                </div>
            </div>    
            <br>
            <!--
            <div class="card bg-light">
                <div>
                    <h4>Descifrar por RSA</h4><br>
                    <form action="encrypt_decrypt_rsa.php" method="POST">
                        <input type="hidden" name="type_rsa" id="type_rsa" value="decrypt">
                        <div class="d-inline col-md-6">
                            <label class="" for="">Cifrado: </label>
                            <input class="col-md-3 btn border-success" type="text" name="txt_msg" id="txt_msg" placeholder="Ingrese el cifrado" required>
                        </div>
                        <br>
                        <div class="d-inline col-md-6">
                            <label class="" for="">Llave privada: </label><br>
                            <textarea name="public_key" id="public_key" cols="60" rows="5"></textarea>
                        </div>
                        <div><br>
                            <button class="btn col-md-4 bg-success text-white">Enviar</button>            
                        </div>
                    </form>
                </div>
                <hr>
                <h4>Resultado</h4>
                <div class="bg-ligh">
                    <textarea class="btn border" name="result_aes" id="result_aes" cols="60" rows="5"></textarea>
                </div>
            </div> 
            -->
        </div>
    </main>
</body>
</html>