<?php
include "koneksi.php";

$error = "";
$perintah = null;

function Read($nama, $koneksi){
    $trimednama = trim($nama);
    if ($trimednama === "")
        return "Nama tolong di isi";
    mysqli_query($koneksi, "DELETE FROM CRUD_S WHERE nama = '$trimednama'");
    return "Delete berhasil";
}
if (isset($_POST['read'])){
    $nama = $_POST['nama'] ?? "";

    $hasil_read = Read($nama, $koneksi);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
    <form method="POST">
        Nama: <input name="nama">
        <button type="submit" name="read">Delete</button>
    </form>
    <p style="color: red;"> <?= $error ?></p><br>
    <a href="index.php">Back</a>
</body>
</html>