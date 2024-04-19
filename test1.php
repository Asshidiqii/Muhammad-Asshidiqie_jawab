<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari input dan mengonversinya menjadi array
    $array_input = $_POST['array_input'];
    $array = explode(",", $array_input);

    // Mengurutkan array
    usort($array, function($a, $b) {
        // Jika kedua elemen adalah angka, urutkan secara normal
        if (is_numeric($a) && is_numeric($b)) {
            return $a - $b;
        }
        // Jika $a adalah angka dan $b adalah huruf, maka $a harus ditempatkan setelah $b
        elseif (is_numeric($a)) {
            return 1;
        }
        // Jika $a adalah huruf dan $b adalah angka, maka $a harus ditempatkan sebelum $b
        elseif (is_numeric($b)) {
            return -1;
        }
        // Jika kedua elemen adalah huruf, urutkan secara alfabetis
        else {
            return strcmp($a, $b);
        }
    });
}
?>

<!-- Form HTML untuk memasukkan input array -->
<form method="post" action="">
    <label for="array_input">Masukkan Elemen Array (pisahkan dengan koma):</label><br>
    <input type="text" id="array_input" name="array_input"><br>
    <input type="submit" value="Urutkan">
</form>

<?php
// Menampilkan array yang sudah diurutkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($array)) {
    echo "Array yang sudah diurutkan:<br>";
    print_r($array);
}
?>
