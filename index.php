<?php
include "koneksi.php";

$hasil = "";
function create($namatemp, $umurtemp, $koneksitemp){
    global $hasil;
    $trimmednama = trim($namatemp);
    if ($trimmednama === "")
        return $hasil = "Nama tolong di isi!";
    if ($umurtemp === "")
        return $hasil = "Umur tolong di isi!";
    if (!is_numeric($umurtemp))
        return $hasil = "Umur harus angka!";

    $umurbersih = (int)$umurtemp;

    mysqli_query($koneksitemp, "INSERT INTO CRUD_S (nama, umur) VALUES ('$trimmednama', '$umurbersih')");
    $hasil = "Create berhasil!";
}
if (isset($_POST['kirim'])){   
    $nama = $_POST['nama'] ?? "";
    $umur = $_POST['umur'] ?? "";

    create($nama, $umur, $koneksi);
}
?>

<form method="POST">
    Nama : <input name="nama" type="text"><br>
    Umur : <input name="umur" type="number"><br>
    <button name="kirim">Buat</button>
    <b><?php echo htmlspecialchars($hasil);?></b>
</form>