# CRUD-Sederhana

Create-Read-Update-Delete menggunakan PHP + MySQL dengan Prepared Statement
## Create

Membuat data dengan ``mysqli_connect()``  

## Konsep yang Dipelajari

- Global Variable: ``global $hasil``
- Return Array:
```php
return [
    "error" => "",
    "perintah" => $hasil
];

$hasil_read = Read($nama, $koneksi);
$error = $hasil_read["error"];
$perintah = $hasil_read["perintah"];
```
- Prepared Statement: mencegah SQL Injection
## Setup Database

```sql
CREATE TABLE CRUD_S (  
id INT AUTO_INCREMENT PRIMARY KEY,  
nama VARCHAR(100),  
umur INT
);
```
setup ``koneksi.php`` 
```php
$host = "localhost";
$user = "root";
$password = "";
$nama_db = "belajarmysql";

$koneksi = mysqli_connect($host, $user, $password, $nama_db);

if (!$koneksi){
    die("Koneksi Gagal! : " . mysqli_connect_error());
}
```
## Update Perubahan
- Katanya ``global`` di ``function`` tidak di sarankan jadi di ganti pakai ``return``
- Mengganti kode Query dengan Prepared Statement
### Sebelum:
```php
$hasil = mysqli_query($koneksi, "SELECT * FROM CRUD_S WHERE nama = '$trimednama'");
```
### Sesudah
```php
$pernyataan = mysqli_prepare($koneksi, "SELECT * FROM CRUD_S WHERE nama = ?");
mysqli_stmt_bind_param($pernyataan, "s", $trimednama);
mysqli_stmt_execute($pernyataan);
$hasil = mysqli_stmt_get_result($pernyataan);
```
- Validasi hasil jika input tidak ada dalam DataBase 
```php 
mysqli_num_rows();
```
Untuk ``read.php``
```php
mysqli_stmt_affected_rows();
```
Untuk ``update.php`` & ``delete.php``
## Kelebihan
- SQL injection dengan ketik ini ``' OR '1'='1`` hanya akan dianggapa data biasa
