<?php
session_start();
include "validasi_login.php";
$conn = mysqli_connect("localhost", "root", "", "backup_presensi");

if(isset($_FILES["webcam"]["tmp_name"])){
  $tmpName = $_FILES["webcam"]["tmp_name"];
  date_default_timezone_set("Asia/Bangkok");
  $ID = $_SESSION['ID'];
  $nama = $_SESSION['Nama'];
  $divisi = $_SESSION['Divisi'];
  $imageName = $nama . " " . date("Y.m.d") . " - " . date("H.i.s") . '.jpeg';
  $alamatFolder = '../backup_presensi/' . $imageName;
  move_uploaded_file($tmpName,'backup_presensi/' . $imageName);

  $date = date("Y-m-d");
  $time = date("H:i:s");
  $query = "INSERT INTO backup VALUES ('$ID','$nama','$divisi','$date','$time','$alamatFolder')";
  mysqli_query($conn, $query);
}