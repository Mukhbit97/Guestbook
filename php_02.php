<?php

function faktorBesar($angka1, $angka2) {
    $faktor1 = array();
    for ($i = 1; $i <= $angka1; $i++) {
        if ($angka1 % $i == 0) {
            $faktor1[] = $i;
        }
    }
    
    $faktor2 = array();
    for ($i = 1; $i <= $angka2; $i++) {
        if ($angka2 % $i == 0) {
            $faktor2[] = $i;
        }
    }
    
    echo "Faktor $angka1: [";
    $panjang1 = 0;
    foreach ($faktor1 as $faktor) {
        $panjang1++;
    }
    
    $counter1 = 0;
    foreach ($faktor1 as $faktor) {
        echo $faktor;
        $counter1++;
        if ($counter1 < $panjang1) {
            echo ", ";
        }
    }
    echo "]\n";
    
    echo "Faktor $angka2: [";
    $panjang2 = 0;
    foreach ($faktor2 as $faktor) {
        $panjang2++;
    }
    
    $counter2 = 0;
    foreach ($faktor2 as $faktor) {
        echo $faktor;
        $counter2++;
        if ($counter2 < $panjang2) {
            echo ", ";
        }
    }
    echo "]\n";
    
    $fpb = 1;
    
    foreach ($faktor1 as $f1) {
         $ada = false;
        foreach ($faktor2 as $f2) {
            if ($f1 === $f2) {
                $ada = true;
                break;
            }
        }
        
        if ($ada && $f1 > $fpb) {
            $fpb = $f1;
        }
    }
    
    return $fpb;
}

// TEST CASE 1
echo "faktorBesar(12, 36)\n";
$hasil1 = faktorBesar(12, 36);
echo "Faktor Persekutuan Terbesar: " . $hasil1 . "\n\n";

// TEST CASE 2
echo "faktorBesar(12, 33)\n";
$hasil2 = faktorBesar(12, 33);
echo "Faktor Persekutuan Terbesar: " . $hasil2 . "\n\n";

// TEST CASE 3 (opsional)
echo "faktorBesar(18, 24)\n";
$hasil3 = faktorBesar(18, 24);
echo "Faktor Persekutuan Terbesar: " . $hasil3 . "\n";
?>