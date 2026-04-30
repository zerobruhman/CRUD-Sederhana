<?php
include "koneksi.php";

$hasil = "";
$hasil_read = "";
$baris = "";

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
function read($id, $koneksitemp){
    global $hasil_read;
    global $baris;
    if ($id === "")
        return $hasil_read = "Id tolong di isi";
    if (!is_numeric($id))
        return $hasil_read = "Id harus angka isi";

    $baris = mysqli_fetch_assoc(mysqli_query($koneksitemp, "SELECT * FROM CRUD_S WHERE id = $id"));
}
if (isset($_POST['create'])){   
    $nama = $_POST['nama'] ?? "";
    $umur = $_POST['umur'] ?? "";

    create($nama, $umur, $koneksi);
}
if (isset($_POST['id'])){
    $id = $_POST['id'] ?? "";

    read($id, $koneksi);
}
?>

<form method="POST">
    Nama : <input name="nama" type="text"><br>
    Umur : <input name="umur" type="number"><br>
    <button name="create">Buat</button>
    <b><?php echo htmlspecialchars($hasil);?></b>
</form>
<form method="POST">
    <h1>Masukkan id untuk Read</h1>
    Id : <input name="id" type="number">
    <?php while ($baris){
        #echo $baris["nama"] . " " . $baris["umur"];
    }?>
</form>