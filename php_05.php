
<?php
// Function untuk mengecek apakah dua kata adalah permainan acak
function acak($kata1, $kata2) {
    // Cek panjang kata terlebih dahulu
    $panjang1 = 0;
    $panjang2 = 0;
    
    // Hitung panjang kata1
    for ($i = 0; isset($kata1[$i]); $i++) {
        $panjang1++;
    }
    
    // Hitung panjang kata2
    for ($i = 0; isset($kata2[$i]); $i++) {
        $panjang2++;
    }
    
    // Jika panjang berbeda, langsung return false
    if ($panjang1 !== $panjang2) {
        return false;
    }
    
    // Hitung frekuensi setiap huruf dalam kata1
    $frekuensi1 = array();
    for ($i = 0; $i < $panjang1; $i++) {
        $huruf = $kata1[$i];
        $ditemukan = false;
        
        foreach ($frekuensi1 as $key => $value) {
            if ($key === $huruf) {
                $frekuensi1[$key]++;
                $ditemukan = true;
                break;
            }
        }
        
        if (!$ditemukan) {
            $frekuensi1[$huruf] = 1;
        }
    }
    
    // Hitung frekuensi setiap huruf dalam kata2
    $frekuensi2 = array();
    for ($i = 0; $i < $panjang2; $i++) {
        $huruf = $kata2[$i];
        $ditemukan = false;
        
        foreach ($frekuensi2 as $key => $value) {
            if ($key === $huruf) {
                $frekuensi2[$key]++;
                $ditemukan = true;
                break;
            }
        }
        
        if (!$ditemukan) {
            $frekuensi2[$huruf] = 1;
        }
    }
    
    // Bandingkan frekuensi huruf
    foreach ($frekuensi1 as $huruf => $count1) {
        $ditemukan = false;
        
        foreach ($frekuensi2 as $huruf2 => $count2) {
            if ($huruf === $huruf2 && $count1 === $count2) {
                $ditemukan = true;
                break;
            }
        }
        
        if (!$ditemukan) {
            return false;
        }
    }
    
    // Cek juga sebaliknya untuk memastikan semua huruf sama
    foreach ($frekuensi2 as $huruf => $count2) {
        $ditemukan = false;
        
        foreach ($frekuensi1 as $huruf1 => $count1) {
            if ($huruf === $huruf1 && $count2 === $count1) {
                $ditemukan = true;
                break;
            }
        }
        
        if (!$ditemukan) {
            return false;
        }
    }
    
    return true;
}

// Function untuk menampilkan hasil tes dengan format yang rapi
function testAcak($kata1, $kata2, $expected = null) {
    $result = acak($kata1, $kata2);
    $status = $result ? "true" : "false";
    
    echo "acak('$kata1', '$kata2') = $status";
    
    if ($expected !== null) {
        $match = $result === $expected ? " ✓ BENAR" : " ✗ SALAH (harusnya: " . ($expected ? "true" : "false") . ")";
        echo $match;
    }
    
    echo "\n";
}

// TEST CASES
echo "<h2>Test Permainan Kata Acak</h2>";
echo "<pre>";

echo "=== TEST CASE 1 ===\n";
testAcak("satu", "utas", true);
testAcak("satu", "tuas", true);

echo "\n=== TEST CASE 2 ===\n";
testAcak("tea", "eat", true);
testAcak("tea", "ate", true);

echo "\n=== TEST CASE 3 ===\n";
testAcak("tea", "tie", false);
testAcak("tea", "tee", false);

echo "\n=== TEST CASE 4 ===\n";
testAcak("bara", "arab", true);
testAcak("bara", "raba", true);
testAcak("bara", "riba", false);

echo "\n=== TEST CASE 5 ===\n";
testAcak("rusak", "kasur", true);
testAcak("hello", "world", false);
testAcak("listen", "silent", true);

echo "\n=== TEST CASE 6 (Kata dengan huruf duplikat) ===\n";
testAcak("aabb", "abab", true);
testAcak("aabb", "abba", true);
testAcak("aabb", "aabc", false);

echo "\n=== TEST CASE 7 (Panjang berbeda) ===\n";
testAcak("abc", "abcd", false);
testAcak("long", "short", false);

echo "</pre>";

// Function tambahan untuk menampilkan analisis kata
function analisisKata($kata) {
    echo "Analisis kata: '$kata'\n";
    
    $panjang = 0;
    for ($i = 0; isset($kata[$i]); $i++) {
        $panjang++;
    }
    echo "Panjang: $panjang\n";
    
    $frekuensi = array();
    for ($i = 0; $i < $panjang; $i++) {
        $huruf = $kata[$i];
        if (!isset($frekuensi[$huruf])) {
            $frekuensi[$huruf] = 0;
        }
        $frekuensi[$huruf]++;
    }
    
    echo "Frekuensi huruf: ";
    foreach ($frekuensi as $huruf => $count) {
        echo "$huruf:$count ";
    }
    echo "\n\n";
}

// Demo analisis untuk beberapa kata
echo "<h3>Demo Analisis Kata</h3>";
echo "<pre>";
analisisKata("satu");
analisisKata("utas");
analisisKata("tea");
analisisKata("eat");
echo "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Permainan Kata Acak</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        pre { 
            background: #f5f5f5; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #007bff;
        }
        h2 { color: #333; }
        h3 { color: #555; }
    </style>
</head>
<body>
    <h1>PHP Permainan Kata Acak</h1>
    <p>Program untuk mengecek apakah dua kata merupakan permainan acak (anagram)</p>
</body>
</html>