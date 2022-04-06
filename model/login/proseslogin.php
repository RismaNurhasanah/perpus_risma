<?php
    session_start();
    include "../../config/koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];


    if( empty($username) == true OR empty($password) == true) {
        $errors[] = '*username/password field is required';
    }
    else {
        // if username exists
        $sql = "SELECT * FROM tabel_user WHERE username = '$username'";
        $query = $db->query($sql);
        if( $query->num_rows > 0) {
            // chek username and password
            $password = $password;
            
            $sql = "SELECT * FROM tabel_user WHERE username = '$username'
            AND password = '$password'";
            $hasil = $db->query($sql);
          
            $result = $query->fetch_array();
            $db->close();

            if($hasil->num_rows ==  1) {
                $_SESSION['logged_in']  = true;
                $_SESSION['user_id']    = $result['id_user'];
                $_SESSION['username']   = $result['username'];
                $_SESSION['level']      = $result['level'];
                header('Location:../../beranda.php');
                // echo "berhasil";
                exit();
            }
            else {
                header('Location:../../index.php');
            }
        }
    }