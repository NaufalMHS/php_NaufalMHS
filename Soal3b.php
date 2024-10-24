<?php
$conn = new mysqli("localhost", "root", "", "testdb");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];

$sql = "SELECT person.nama, person.alamat, hobi.hobi 
        FROM person 
        JOIN hobi ON person.id = hobi.person_id
        WHERE person.nama LIKE '%$nama%' AND person.alamat LIKE '%$alamat%'";
$result = $conn->query($sql);

$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html>
<head>
    <title>Hasil Pencarian</title>
</head>
<body>
    <h2>Hasil Pencarian</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["nama"] . "</td><td>" . $row["alamat"] . "</td><td>" . $row["hobi"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Tidak ada data ditemukan</td></tr>";
        }
        ?>
    </table>
    <a href="soal3a.php">Kembali ke daftar</a>
</body>
</html>

<?php
$conn->close();
?>
