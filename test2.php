<?php
function pattern_count($text, $pattern) {
    $text_length = strlen($text);
    $pattern_length = strlen($pattern);
    $count = 0;

    // Iterasi melalui teks
    for ($i = 0; $i <= $text_length - $pattern_length; $i++) {
        $match = true;
        // Periksa apakah pola cocok
        for ($j = 0; $j < $pattern_length; $j++) {
            if ($text[$i + $j] != $pattern[$j]) {
                $match = false;
                break;
            }
        }
        // Jika pola cocok, tambahkan ke hitungan
        if ($match) {
            $count++;
        }
    }

    return $count;
}

// Memeriksa apakah ada input dari pengguna
if (isset($_POST['text']) && isset($_POST['pattern'])) {
    $text = $_POST['text'];
    $pattern = $_POST['pattern'];
    $result = pattern_count($text, $pattern);
    echo "Jumlah pola yang ditemukan: " . $result;
}
?>

<!-- Form HTML untuk memasukkan input -->
<form method="post" action="">
    <label for="text">Masukkan Teks:</label><br>
    <input type="text" id="text" name="text"><br>
    <label for="pattern">Masukkan Pola:</label><br>
    <input type="text" id="pattern" name="pattern"><br>
    <input type="submit" value="Hitung">
</form>
