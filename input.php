<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $kecamatan = $_POST['kecamatan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];

    $sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk) 
            VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "<div style='width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc;'>";
echo "<h2>Input Data Penduduk</h2>";
echo "<form action='' method='POST'>";
echo "<div style='margin-bottom: 15px;'><label>Kecamatan:</label><br><input type='text' name='kecamatan' style='width: 100%;' required></div>";
echo "<div style='margin-bottom: 15px;'><label>Longitude:</label><br><input type='number' step='any' name='longitude' style='width: 100%;' required></div>";
echo "<div style='margin-bottom: 15px;'><label>Latitude:</label><br><input type='number' step='any' name='latitude' style='width: 100%;' required></div>";
echo "<div style='margin-bottom: 15px;'><label>Luas (km²):</label><br><input type='number' step='any' name='luas' style='width: 100%;' required></div>";
echo "<div style='margin-bottom: 15px;'><label>Jumlah Penduduk:</label><br><input type='number' name='jumlah_penduduk' style='width: 100%;' required></div>";
echo "<button type='submit' name='submit' style='padding: 10px 15px; background-color: #ef5195; color: white; border: none; cursor: pointer;'>Simpan Data</button>";
echo "</form>";
echo "</div>";
?>