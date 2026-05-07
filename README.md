# CRUD-Sederhana

Create-Read-Update-Delete menggunakan PHP + MySQL
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
## Next
-  Security SQL basic, Masih Rawan SQL injection (di next repo)

## Update Perubahan
- Katanya ``global`` di ``function`` tidak di sarankan jadi di ganti pakai ``return``

## Kekurangan
- Masih rawan SQL injection coba di ``read.php`` dengan ketik ini ``' OR '1'='1`` maka semua table akan di perlihatkan!
