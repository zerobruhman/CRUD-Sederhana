<?php
include "koneksi.php";

$error = "";
$perintah = null;

function Read($nama, $koneksi){
    $trimednama = trim($nama);
    if ($trimednama === "")
        return [
            "error" => "Nama tolong di isi",
            "perintah" => null
        ];
    $hasil = mysqli_query($koneksi, "SELECT * FROM CRUD_S WHERE nama = '$trimednama'");
    return [
        "error" => "",
        "perintah" => $hasil
    ];
}
if (isset($_POST['read'])){
    $nama = $_POST['nama'] ?? "";

    $hasil_read = Read($nama, $koneksi);
    $error = $hasil_read["error"];
    $perintah = $hasil_read["perintah"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
</head>
<body>
    <form method="POST">
        Nama: <input name="nama">
        <button type="submit" name="read">Read</button>
    </form>
    <p style="color: red;"> <?= $error ?></p><br>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Umur</th>
        </tr>
        <?php if ($perintah) { ?>
            <?php while ($baris = mysqli_fetch_assoc($perintah)) { ?>
            <tr>
                <td><?= $baris['nama']; ?></td>
                <td><?= $baris['umur']; ?></td>
            </tr>
            <?php } ?>
        <?php } ?> 
    </table>
    <a href="index.php">Back</a>
</body>
</html>