<?php
include 'koneksi.php';

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Penduduk</title>
    <style>
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { border: 1px solid black; padding: 8px; text-align: center; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Data Jumlah Penduduk</h2>
    <div style="width: 80%; margin: 10px auto; text-align: right;">
    <a href="input.php" style="padding: 8px 15px; background: #ea44c9; color: white; text-decoration: none;">+ Tambah Data</a>
</div>
    <table>
        <tr>
            <th>ID</th>
            <th>Kecamatan</th>
            <th>Longitude</th>
            <th>Latitude</th>
            <th>Luas (km²)</th>
            <th>Jumlah Penduduk</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["id"]."</td>
                        <td>".$row["kecamatan"]."</td>
                        <td>".$row["longitude"]."</td>
                        <td>".$row["latitude"]."</td>
                        <td>".$row["luas"]."</td>
                        <td>".$row["jumlah_penduduk"]."</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>