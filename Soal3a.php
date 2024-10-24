<?php
$conn = new mysqli("localhost", "root", "", "testdb");

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT person.nama, person.alamat, hobi.hobi 
        FROM person 
        JOIN hobi ON person.id = hobi.person_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Person dan Hobi</title>
</head>
<body>
    <h2>Daftar Person dan Hobi</h2>
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
            echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
        }
        ?>
    </table>

    <h2>Form Pencarian</h2>
    <form method="POST" action="soal3b.php">
        <label>Nama: </label>
        <input type="text" name="nama"><br>
        <br>
        <label>Alamat:</label>
        <input type="text" name="alamat"><br>
        <br>
        <button type="submit">SEARCH</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
