<?php
include 'koneksi.php';

// Cek apakah tombol Simpan sudah diklik
if (isset($_POST['submit'])) {
    $kecamatan = $_POST['kecamatan'];
    $longitude = $_POST['longitude'];
    $latitude = $_POST['latitude'];
    $luas = $_POST['luas'];
    $jumlah_penduduk = $_POST['jumlah_penduduk'];

    // Query untuk menyimpan data ke database
    $sql = "INSERT INTO penduduk (kecamatan, longitude, latitude, luas, jumlah_penduduk) 
            VALUES ('$kecamatan', '$longitude', '$latitude', '$luas', '$jumlah_penduduk')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Input Data Penduduk</title>
    <style>
        .form-container { width: 400px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input { width: 100%; padding: 8px; box-sizing: border-box; }
        button { padding: 10px 15px; background-color: #ea44c9; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Input Data Penduduk</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Kecamatan:</label>
                <input type="text" name="kecamatan" required>
            </div>
            <div class="form-group">
                <label>Longitude:</label>
                <input type="number" step="any" name="longitude" required>
            </div>
            <div class="form-group">
                <label>Latitude:</label>
                <input type="number" step="any" name="latitude" required>
            </div>
            <div class="form-group">
                <label>Luas (km²):</label>
                <input type="number" step="any" name="luas" required>
            </div>
            <div class="form-group">
                <label>Jumlah Penduduk:</label>
                <input type="number" name="jumlah_penduduk" required>
            </div>
            <button type="submit" name="submit">Simpan Data</button>
        </form>
    </div>
</body>
</html>