
<?php
function buatMatrix($n) {
    $hasil = "";
    
    if ($n < 1 || $n > 10) {
        return "Input harus antara 1-10";
    }
    
    for ($baris = 0; $baris < $n; $baris++) {
        for ($kolom = 0; $kolom < $n; $kolom++) {
            // Hitung nilai untuk posisi ini
            $posisi = $n - $baris;
            
            if ($kolom == $n - $baris - 1) {
                // Posisi diagonal - tampilkan angka
                $hasil .= $posisi;
            } else if ($kolom < $n - $baris - 1) {
                // Sebelum diagonal - tampilkan *
                $hasil .= "*";
            } else {
                // Setelah diagonal - tampilkan *
                $hasil .= "*";
            }
        }
        $hasil .= "\n";
    }
    
    return $hasil;
}

function buatMatrixFixed($n) {
    $hasil = "";
    
    if ($n < 1 || $n > 10) {
        return "Input harus antara 1-10";
    }
    
    for ($baris = 0; $baris < $n; $baris++) {
        for ($kolom = 0; $kolom < $n; $kolom++) {
            // Hitung nilai untuk posisi ini
            $angka = $n - $baris;
            
            if ($kolom == $n - $baris - 1) {
                // Posisi diagonal - tampilkan angka
                $hasil .= $angka;
            } else if ($kolom < $n - $baris - 1) {
                // Sebelum diagonal - tampilkan *
                $hasil .= "*";
            } else {
                // Setelah diagonal - tampilkan *
                $hasil .= "*";
            }
        }
        $hasil .= "\n";
    }
    
    return $hasil;
}

function buatMatrixFinal($n) {
    $hasil = "";
    
    if ($n < 1 || $n > 10) {
        return "Input harus antara 1-10";
    }
    
    for ($baris = 0; $baris < $n; $baris++) {
        for ($kolom = 0; $kolom < $n; $kolom++) {
            $angka = $n - $baris;
            
            if ($kolom == $n - 1 - $baris) {
                // Diagonal dari kanan atas ke kiri bawah - tampilkan angka
                $hasil .= $angka;
            } else {
                // Bukan diagonal - tampilkan *
                $hasil .= "*";
            }
        }
        $hasil .= "\n";
    }
    
    return $hasil;
}

// Proses form jika ada input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = isset($_POST['angka']) ? (int)$_POST['angka'] : 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Matrix Generator</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 500px; }
        input[type="number"] { 
            width: 100px; 
            padding: 8px; 
            margin: 10px 0; 
        }
        input[type="submit"] { 
            padding: 8px 16px; 
            background: #007bff; 
            color: white; 
            border: none; 
            cursor: pointer; 
        }
        .matrix { 
            font-family: monospace; 
            white-space: pre; 
            margin: 20px 0; 
            padding: 15px; 
            background: #f5f5f5; 
            border-radius: 5px; 
        }
        .error { color: red; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Matrix Generator</h2>
        <form method="post">
            <label for="angka">Masukkan angka (1-10):</label><br>
            <input type="number" id="angka" name="angka" min="1" max="10" required>
            <input type="submit" value="Generate Matrix">
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="result">
                <h3>Output untuk input <?php echo $input; ?>:</h3>
                <div class="matrix">
                    <?php
                    if ($input >= 1 && $input <= 10) {
                        echo buatMatrixFinal($input);
                    } else {
                        echo "<div class='error'>Input harus antara 1-10</div>";
                    }
                    ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="examples">
            <h3>Contoh:</h3>
            <p><strong>Input 1:</strong></p>
            <div class="matrix">1</div>
            
            <p><strong>Input 2:</strong></p>
            <div class="matrix">*2
1*</div>
            
            <p><strong>Input 4:</strong></p>
            <div class="matrix">***4
**3*
*2**
1***</div>
        </div>
    </div>
</body>
</html>