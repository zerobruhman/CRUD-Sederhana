# CRUD-Sederhana

Create-Read-Update-Delete menggunakan PHP + MySQL
## Create

Membuat data dengan ``mysqli_connect()``  

## Konsep yang Dipelajari

-  Global Variable: ``global $hasil``
## Setup Database

```sql
CREATE TABLE CRUD_S (  
id INT AUTO_INCREMENT PRIMARY KEY,  
nama VARCHAR(100),  
umur INT
);
```
Setup ``koneksi.php``
```php
$host = "host_yang_kamu_pakai!";
$user = "username_kamu!";
$password = "password_kamu!";
$nama_db = "nama_db_kamu!";

$koneksi = mysqli_connect($host, $user, $password, $nama_db);

if (!$koneksi){
    die("Koneksi Gagal! : " . mysqli_connect_error());
}
```
## Next
-  Menambahkan **Read, Update dan Delete**
-  Security SQL basic

