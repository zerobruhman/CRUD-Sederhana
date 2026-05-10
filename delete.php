<?php
include "koneksi.php";

function Read($nama, $koneksi){
    $trimednama = trim($nama);
    if ($trimednama === "")
        return "Nama tolong di isi";
    $pernyataan = mysqli_prepare($koneksi, "DELETE FROM CRUD_S WHERE nama = ?");
    mysqli_stmt_bind_param($pernyataan, "s", $trimednama);
    mysqli_stmt_execute($pernyataan);
    if (mysqli_stmt_affected_rows($pernyataan) > 0)
        return "Delete berhasil";
    else
        return "Delete gagal!";
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