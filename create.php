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

    mysqli_query($koneksitemp, "INSERT INTO CRUD_S (nama, umur) VALUES ('$trimmednama', '$umurbersih')");
    return $hasil = "Create berhasil!";
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
