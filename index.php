<?php
include 'koneksi.php';

$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

echo "<div style='width: 80%; margin: 10px auto; text-align: right;'>";
echo "<a href='input.php' style='padding: 8px 15px; background: #ef5195; color: white; text-decoration: none;'>+ Tambah Data</a>";
echo "</div>";

if ($result->num_rows > 0) {
    echo "<table style='border-collapse: collapse; width: 80%; margin: 20px auto;'>
    <tr style='background-color: #f2f2f2;'>
        <th style='border: 1px solid black; padding: 8px; text-align: center;'>Kecamatan</th>
        <th style='border: 1px solid black; padding: 8px; text-align: center;'>Longitude</th>
        <th style='border: 1px solid black; padding: 8px; text-align: center;'>Latitude</th>
        <th style='border: 1px solid black; padding: 8px; text-align: center;'>Luas (km²)</th>
        <th style='border: 1px solid black; padding: 8px; text-align: center;'>Jumlah Penduduk</th>
        <th style='border: 1px solid black; padding: 8px; text-align: center;' colspan='2'>Aksi</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["kecamatan"]."</td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["longitude"]."</td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["latitude"]."</td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["luas"]."</td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'>".$row["jumlah_penduduk"]."</td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'><a href='delete.php?id=".$row["id"]."' onclick=\"return confirm('Yakin ingin menghapus data ini?');\" style='color: #fe2d42; text-decoration: none; font-weight: bold;'>hapus</a></td>
            <td style='border: 1px solid black; padding: 8px; text-align: center;'><a href='edit/index.php?id=".$row["id"]."' style='color: #58a4f4; text-decoration: none; font-weight: bold;'>edit</a></td>
        </tr>";
    }
    echo "</table>";
} else {
    echo "<table style='border-collapse: collapse; width: 80%; margin: 20px auto;'>
    <tr><td style='border: 1px solid black; padding: 8px; text-align: center;'>Tidak ada data</td></tr>
    </table>";
}

$conn->close();
?>