<?php 
    include "../../config/koneksi.php";

   
    $id_pegawai         = $_POST['id_pegawai'];
    $nama_pegawai       = $_POST['nama_pegawai'];
    $jenis_kelamin      = $_POST['jenis_kelamin'];
    $alamat             = $_POST['alamat'];
    $no_hp              = $_POST['no_hp'];
    $jabatan            = $_POST['jabatan'];


    $sql = "Update tabel_pegawai set
        nama_pegawai   = '".$nama_pegawai."',
        jenis_kelamin   = '".$jenis_kelamin."',
        alamat          = '".$alamat."',
        no_hp           = '".$no_hp."',
        jabatan         = '".$jabatan."'
        
        where id_pegawai = '".$id_pegawai."'
        ";
    
    $db->query($sql);


    header('Location: ../../beranda.php?page=pegawai');

?>

