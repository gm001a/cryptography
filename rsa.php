<?php

require_once('./config/conex.php');

//receive data the form rsa
$option_rsa = $_POST['type_rsa'];
$username = $_POST['txt_username'];
$password = $_POST['txt_password'];



// create the keypair
$res = openssl_pkey_new();
// get private key
openssl_pkey_export($res, $privatekey);
// get public key
$publickey = openssl_pkey_get_details($res);
$publickey = $publickey["key"];
//echo "Llave privada: <br>".$privatekey."<br><br>Llave publica: <br>".$publickey."<br><br>";

echo "username: ".$username."<br>";
echo "password: ".$password."<br>";


// create the keypair
$res = openssl_pkey_new();

// get private key
openssl_pkey_export($res, $privatekey);

// get public key
$publickey = openssl_pkey_get_details($res);
$publickey = $publickey["key"];






if($option_rsa=="encrypt"){
    openssl_public_encrypt($password, $crypttext, $publickey);
    echo "---------------------------------------------------<br>";
    echo "Password encrypted: <br>".$crypttext."<br><br>";
    file_put_contents($username.'.txt',$crypttext);
    $sql = "INSERT INTO tbl_rsa (vch_username, vch_password, vch_keypublic, vch_keyprivate) VALUES('$username', '$username.txt', '$publickey', '$privatekey')";
    $query = $conn->query($sql);
    if(!$query){
        echo "error!".$conn->error."<br>";
    }
}else if($option_rsa=="decrypt"){
    $name_file = "";
    $crypttext = ""; 
    $privatekey = "";
    // busca usuario
    $sql = "SELECT * FROM tbl_rsa WHERE vch_username='$username'";
    $query = $conn->query($sql);
    while ($row = mysqli_fetch_ASSOC($query))
    {
        $name_file = $row ["vch_password"];
        $privatekey = $row ["vch_keyprivate	"];
    }
    if(touch($name_file)){
        
        $archivoID = fopen($name_file, "r");
        while( !feof($archivoID)){
            $linea = fgets($archivoID, 1024);
            $crypttext = $linea;
        }
        fclose($archivoID);
    }
    echo "cifrado-> ".$crypttext;
    echo "keyprivate-> ".$privatekey;
    openssl_private_decrypt($crypttext, $decrypted, $privatekey);

    echo "Decrypted password: <br>".$decrypted."<br><br>";

}


//almacenar la texto encriptado, clave privada. estado de enciptacion para saber en que parte de html mostrar
// si esta encriptado mostrar en la primera si esta descifrado en la segunda
?>