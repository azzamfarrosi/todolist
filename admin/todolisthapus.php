
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM todolist WHERE idtodolist='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script> location ='index.php?halaman=todolistdaftar';</script>"; ?>