<?php
//connection mysql
require_once("./config/conex.php");

//receive data the view_aes
$option_aes = $_POST['opt_aes'];
$username = $_POST['txt_username'];
$password = $_POST['txt_password'];
$key = $_POST['txt_key'];





//process
if ($option_aes == 'encrypt') {
    $password_encrypted = encrypt_msg($password, $key);
    insert_ciphered_message($username, $password_encrypted, $conn, $key);

}else if($option_aes == 'decrypt'){    
    $password_decrypted = descifrar_msg($password, $key);
    update_ciphered_message($username, $password_decrypted, $password, $conn);
}else{
    echo "<script>alert('Ninguna opción seleccionada'); window.location = 'view_aes.php'</script>";
}



// send data to mysql encrypted
function insert_ciphered_message($username, $password_encrypted, $conn){
    
    $sql = "SELECT * FROM tbl_aes where vch_username='$username'";
    $query = $conn->query($sql);
    $num_rows = mysqli_num_rows($query);
    
    if($num_rows>0){
        echo "<script>alert('El usuario ya existe se actualizará la clave);</script>";
        $sql = "UPDATE tbl_aes SET vch_password = '$password_encrypted' where vch_username='$username'";
        $query = $conn->query($sql);
        if(!$query){
            echo "<script>alert('Error mysql update password!'); window.location='view_aes.php'</script>";
        }else{
            echo "<script>window.location='view_aes.php'</script>";
        }
    }else{
        $sql = "INSERT INTO tbl_aes (vch_username, vch_password) VALUES('$username', '$password_encrypted')";
        $query = $conn->query($sql);
        if($query){
            echo "correcto<br>";
            echo "<script>alert('data send!'); window.location='view_aes.php'</script>";
        }else{
            echo "<script>alert('Error mysql insert!'); window.location='view_aes.php'</script>";
        }
    }
}

// send update of data to mysql decrypted
function update_ciphered_message($username, $password_decrypted, $password, $conn){
    $sql = "UPDATE tbl_aes SET vch_password = '$password_decrypted' where vch_username='$username'";
    $query = $conn->query($sql);
    if($query){
        echo "<script>alert('data update!'); window.location='view_aes.php'</script>";
    }else{
        echo "<script>alert('Error decrypted!'); window.location='view_aes.php'</script>";
    }
}






/*************** encrypt data ******************** */
function encrypt_msg($password, $key){

    $ini_vec = openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC'));
    $password_encrypted = openssl_encrypt($password, "AES-256-CBC", $key, 0, $ini_vec);

    return base64_encode($password_encrypted."::".$ini_vec);
}


/*************** encrypt data ******************** */
function descifrar_msg($password, $key){

    list($data_encrypted, $ini_vec) = explode('::', base64_decode($password),2);

    return openssl_decrypt($data_encrypted, 'AES-256-CBC', $key, 0, $ini_vec);
}

?>