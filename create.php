<?php
include "koneksi.php";

$hasil = "";
function create($namatemp, $umurtemp, $koneksitemp){
    $trimmednama = trim($namatemp);
    if ($trimmednama === "")
        return $hasil = "Nama tolong di isi!";
    if ($umurtemp === "")
        return $hasil = "Umur tolong di isi!";
    if (!is_numeric($umurtemp))
        return $hasil = "Umur harus angka!";

    $umurbersih = (int)$umurtemp;

    $pernyataan = mysqli_prepare(
        $koneksitemp,
        "INSERT INTO CRUD_S (nama, umur)
        VALUES (?, ?)"
    );
    mysqli_stmt_bind_param(
        $pernyataan,
        "si",
        $trimmednama,
        $umurbersih
    );
    mysqli_stmt_execute($pernyataan);
    return "Create berhasil!";
}
if (isset($_POST['create'])){   
    $nama = $_POST['nama'] ?? "";
    $umur = $_POST['umur'] ?? "";

    $hasil = create($nama, $umur, $koneksi);
}
?>

<form method="POST">
    Nama : <input name="nama" type="text"><br>
    Umur : <input name="umur" type="number"><br>
    <button name="create">Buat</button>
    <b><?php echo htmlspecialchars($hasil);?></b>
</form>
<a href="index.php">Back</a>
