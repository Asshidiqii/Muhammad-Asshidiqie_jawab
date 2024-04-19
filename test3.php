<?php
function count_and_sort_letters($input) {
    $input = strtolower($input);
    $counts = [];
    $characters = str_split($input);

    foreach ($characters as $char) {
        if (ctype_alpha($char)) {
            if (isset($counts[$char])) {
                $counts[$char]++;
            } else {
                $counts[$char] = 1;
            }
        }
    }

    ksort($counts);

    return $counts;
}

// Fungsi untuk menampilkan hasil
function display_result($result) {
    echo "Hasil Penghitungan Huruf:\n";
    foreach ($result as $char => $count) {
        echo "'$char': $count\n";
    }
}

// Memeriksa apakah ada input dari pengguna
if (isset($_POST['input'])) {
    $input = $_POST['input'];
    $result = count_and_sort_letters($input);
    display_result($result);
}
?>

<!-- Form HTML untuk memasukkan input -->
<form method="post" action="">
    <label for="input">Masukkan Teks:</label><br>
    <input type="text" id="input" name="input"><br>
    <input type="submit" value="Hitung">
</form>
