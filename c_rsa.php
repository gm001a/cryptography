<?php

//receive data the form rsa
$option_rsa = $_POST['type_rsa'];
$username = $_POST['txt_username'];
$password = $_POST['txt_password'];

if($option_rsa=="encrypt"){
    echo "";
}else if($option_rsa=="decrypt"){

    // data 
    echo "option: ".$option_aes."<br>";
    echo "msg: ".$password."<br>";
    $key_p = $_POST['public_key'];

    echo "key: ".$key_p."<br>";

}


echo "username: ".$username."<br>";
echo "password: ".$password."<br>";

// create the keypair
$res = openssl_pkey_new();

// get private key
openssl_pkey_export($res, $privatekey);

// get public key
$publickey = openssl_pkey_get_details($res);
$publickey = $publickey["key"];

echo "Llave privada: <br>".$privatekey."<br><br>Llave publica: <br>".$publickey."<br><br>";


openssl_public_encrypt($password, $crypttext, $publickey);

echo "---------------------------------------------------<br>";

echo "Password encrypted: <br>".$crypttext."<br><br>";

openssl_private_decrypt($crypttext, $decrypted, $privatekey);

echo "Decrypted password: <br>".$decrypted."<br><br>";

//almacenar la texto encriptado, clave privada. estado de enciptacion para saber en que parte de html mostrar
// si esta encriptado mostrar en la primera si esta descifrado en la segunda
?>