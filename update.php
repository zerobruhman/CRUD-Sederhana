<?php
include "koneksi.php";

$hasil = "";
function Update($namaold, $namanew, $umurnew, $koneksi){
    if (trim($namaold) === "" || trim($namanew) === "")
        return "Nama tolong di isi!";
    if ($umurnew === "")
        return "Umur tolong di isi";
    if (!is_numeric($umurnew))
        return "Umur harus angka!";

    mysqli_query($koneksi, "UPDATE CRUD_s SET
    nama='$namanew',
    umur='$umurnew'
    ");
    return "Update berhasil";
}
if (isset($_POST['update'])){
    $namaold = $_POST['namaold'] ?? "";
    $namanew = $_POST['namaew'] ?? "";
    $umurnew = $_POST['umurnew'] ?? "";

    $hasil = Update($namaold, $namanew, $umurnew, $koneksi);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    <form method="POST">
        Nama old<input type="text" name="namaold">
        Nama new<input type="text" name="namanew">
        Nama old<input type="number" name="umurunew">

        <button type="submit" name="update">Tekan disini</button>
    </form>
</body>
</html>