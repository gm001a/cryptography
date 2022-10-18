<?php

require_once("./config/conex.php");

//receive data the form aes
$option_hash2 = $_POST['opt_hash2'];
$username = $_POST['txt_username'];
$password = $_POST['txt_password'];

// type process
if ($option_hash2 == 'encrypt') {
    // data encrypt
    $password_encrypted = hash('sha256',$password);
    insert_ciphered_message($username, $password_encrypted, $conn);

}else if($option_hash2 == 'verify'){
    // data verify
    $password_encrypted = hash('sha256',$password);
    verify_password($username, $password_encrypted, $conn, $password);
}else{
      echo "<script>alert('Ninguna opción seleccionada'); window.location = 'view_hash2.php'</script>";
}


// insert new user
function insert_ciphered_message($username, $password_encrypted, $conn){
    
    $sql = "SELECT * FROM tbl_hash2 where vch_username='$username'";
    $query = $conn->query($sql);
    $num_rows = mysqli_num_rows($query);
    if($num_rows>0){
        
        $sql = "UPDATE tbl_hash2 SET vch_password = '$password_encrypted' where vch_username='$username'";
        $query = $conn->query($sql);
        if(!$query){
            echo "<script>alert('Error mysql update password!'); window.location='view_hash2.php'</script>";
        }else{
           echo "<script>alert('usuario existente se actualiza la clave!'); window.location='view_hash2.php'</script>";
        }
    }else{
        $sql = "INSERT INTO tbl_hash2 (vch_username, vch_password) VALUES('$username', '$password_encrypted')";
        $query = $conn->query($sql);
        if($query){
            echo "<script>alert('data send!'); window.location='view_hash2.php'</script>";
        }else{
            echo "<script>alert('Error mysql insert!'); window.location='view_hash2.php'</script>";
        }
    }
}

// verify password in mysql

function verify_password($username, $password_encrypted, $conn, $password){
    $sql = "SELECT vch_password FROM tbl_hash2 where vch_username='$username' and vch_password='$password_encrypted'";
    $query = $conn->query($sql);
    $num_rows = mysqli_num_rows($query);
    if($num_rows>0){
        echo "<script> alert('Su clave es correcta, se ha decifrado!'); window.location = 'view_hash2.php';</script>";
        $sql = "UPDATE tbl_hash2 SET vch_password = '$password' where vch_username='$username'";
        $query = $conn->query($sql);
        echo "<script> alert('Su clave es correcta, se ha decifrado!'); window.location = 'view_hash2.php';</script>";

    }else{
        echo "<script>alert('su clave es incorrecta!'); window.location = 'view_hash2.php'</script>";
    }
    
}

?>