
<?php
$array = array(790, 483, 281, 224, 483, 60, 698, 483, 790, 168);

function tampilkanDuplikat($arr) {
    $frekuensi = array();
    $panjang = 0;
    
    foreach ($arr as $element) {
        $panjang++;
    }
    
    for ($i = 0; $i < $panjang; $i++) {
        $angka = $arr[$i];
        $ditemukan = false;
    
        foreach ($frekuensi as $key => $value) {
            if ($key === $angka) {
                $frekuensi[$key]++;
                $ditemukan = true;
                break;
            }
        }
    
        if (!$ditemukan) {
            $frekuensi[$angka] = 1;
        }
    }
    
    foreach ($frekuensi as $angka => $jumlah) {
        if ($jumlah > 1) {
            echo $angka . " : " . $jumlah . "\n";
        }
    }
}

tampilkanDuplikat($array);
?>