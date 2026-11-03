<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Penduduk</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f9f9f9;">

<div style="width: 400px; margin: 40px auto; background-color: #ffffff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 25px; box-shadow: 0 4px 8px rgba(0,0,0,0.05);">
    <h2 style="margin-top: 0; color: #333; text-align: center; font-size: 20px; border-bottom: 2px solid #ef5195; padding-bottom: 10px;">Form Edit Data Penduduk</h2>

    <?php
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pgwebacara8";

   
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM penduduk WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
            while($row = $result->fetch_assoc()) {
                echo "<input type='hidden' name='id' value='".$row['id']."'>";
                
                echo "<label style='font-weight: bold; color: #555; display: block; margin-top: 10px;'>Kecamatan:</label>";
                echo "<input type='text' id='kec' name='kecamatan' value='".$row['kecamatan']."' style='width: 100%; padding: 8px; margin-top: 5px; background-color: #eef3fc; border: 1px solid #7f9db9; border-radius: 4px; box-sizing: border-box;' required>";
                
                echo "<label style='font-weight: bold; color: #555; display: block; margin-top: 15px;'>Longitude:</label>";
                echo "<input type='text' id='long' name='longitude' value='".$row['longitude']."' style='width: 100%; padding: 8px; margin-top: 5px; background-color: #eef3fc; border: 1px solid #7f9db9; border-radius: 4px; box-sizing: border-box;' required>";
                
                echo "<label style='font-weight: bold; color: #555; display: block; margin-top: 15px;'>Latitude:</label>";
                echo "<input type='text' id='lat' name='latitude' value='".$row['latitude']."' style='width: 100%; padding: 8px; margin-top: 5px; background-color: #eef3fc; border: 1px solid #7f9db9; border-radius: 4px; box-sizing: border-box;' required>";
                
                echo "<label style='font-weight: bold; color: #555; display: block; margin-top: 15px;'>Luas (km²):</label>";
                echo "<input type='text' id='luas' name='luas' value='".$row['luas']."' style='width: 100%; padding: 8px; margin-top: 5px; background-color: #eef3fc; border: 1px solid #7f9db9; border-radius: 4px; box-sizing: border-box;' required>";
                
                echo "<label style='font-weight: bold; color: #555; display: block; margin-top: 15px;'>Jumlah Penduduk:</label>";
                echo "<input type='text' id='jml_pddk' name='jumlah_penduduk' value='".$row['jumlah_penduduk']."' style='width: 100%; padding: 8px; margin-top: 5px; background-color: #eef3fc; border: 1px solid #7f9db9; border-radius: 4px; box-sizing: border-box;' required>";
                
                echo "<br><br>";
                echo "<input type='submit' value='Simpan Perubahan' style='width: 100%; padding: 10px; background-color: #ef5195; color: white; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; font-size: 14px;'>";
            }
            echo "</form>";
        }
    } else {
        header("Location: ../index.php");
        exit();
    }
    $conn->close();
    ?>

    <p id="informasi" style="color: red; margin-top: 15px; font-weight: bold; text-align: center;"></p>
</div>

<script>
function validateForm() {
    let luas = document.getElementById("luas").value;
    let text = "";
    if (isNaN(luas) || luas < 1) {
        text = "Data luas harus angka dan tidak boleh bernilai negatif";
        event.preventDefault();
    }
    document.getElementById("informasi").innerHTML = text;
}
</script>

</body>
</html>