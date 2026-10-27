<?php
include 'koneksi.php';

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<div style='width: 80%; margin: 10px auto; text-align: right;'>";
echo "<a href='input.php' style='padding: 8px 15px; background: #ef5195; color: white; text-decoration: none;'>+ Tambah Data</a>";
echo "</div>";

echo "<table style='border-collapse: collapse; width: 80%; margin: 20px auto;'>";
echo "<tr style='background-color: #f2f2f2;'>";
echo "<th style='border: 1px solid black; padding: 8px; text-align: center;'>Kecamatan</th>";
echo "<th style='border: 1px solid black; padding: 8px; text-align: center;'>Longitude</th>";
echo "<th style='border: 1px solid black; padding: 8px; text-align: center;'>Latitude</th>";
echo "<th style='border: 1px solid black; padding: 8px; text-align: center;'>Luas (km²)</th>";
echo "<th style='border: 1px solid black; padding: 8px; text-align: center;'>Jumlah Penduduk</th>";
echo "</tr>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["kecamatan"]."</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["longitude"]."</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["latitude"]."</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["luas"]."</td>";
        echo "<td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["jumlah_penduduk"]."</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5' style='border: 1px solid black; padding: 8px; text-align: center;'>Tidak ada data</td></tr>";
}

echo "</table>";

$conn->close();
?>