
<?php
// Function untuk memfilter data berdasarkan usia
function filterByAge($json, $minAge) {
    $result = array();
    
    // Loop melalui setiap elemen dalam array JSON
    $panjang = 0;
    foreach ($json as $item) {
        $panjang++;
    }
    
    // Konversi ke array numeric untuk akses manual
    $dataArray = array();
    $index = 0;
    foreach ($json as $item) {
        $dataArray[$index] = $item;
        $index++;
    }
    
    // Filter data berdasarkan usia
    for ($i = 0; $i < $panjang; $i++) {
        $person = $dataArray[$i];
        
        // Cek usia
        if ($person['age'] >= $minAge) {
            $result[] = array(
                'name' => $person['name'],
                'age' => $person['age']
            );
        }
    }
    
    return $result;
}

// Function untuk mengkonversi array ke JSON string (manual)
function arrayToJson($array) {
    $json = "[";
    $panjang = 0;
    
    foreach ($array as $item) {
        $panjang++;
    }
    
    $counter = 0;
    foreach ($array as $item) {
        $json .= "\n    {\"name\": \"" . $item['name'] . "\", \"age\": " . $item['age'] . "}";
        $counter++;
        if ($counter < $panjang) {
            $json .= ",";
        }
    }
    
    if ($panjang > 0) {
        $json .= "\n";
    }
    $json .= "]";
    
    return $json;
}

// TEST CASE
echo "<h2>Test Filter By Age</h2>";

// Data input
$jsonInput = array(
    array("name" => "Alice", "age" => 25),
    array("name" => "Bob", "age" => 18),
    array("name" => "Charlie", "age" => 30)
);

$minAge = 25;

echo "<h3>Input JSON:</h3>";
echo "<pre>" . arrayToJson($jsonInput) . "</pre>";

echo "<h3>Minimum Age: " . $minAge . "</h3>";

// Panggil function filter
$filteredData = filterByAge($jsonInput, $minAge);

echo "<h3>Output JSON (usia >= " . $minAge . "):</h3>";
echo "<pre>" . arrayToJson($filteredData) . "</pre>";

// TEST CASE 2
echo "<hr>";
echo "<h3>Test Case 2 - Minimum Age: 20</h3>";

$minAge2 = 20;
$filteredData2 = filterByAge($jsonInput, $minAge2);

echo "<h3>Output JSON (usia >= " . $minAge2 . "):</h3>";
echo "<pre>" . arrayToJson($filteredData2) . "</pre>";

// TEST CASE 3 dengan data lebih banyak
echo "<hr>";
echo "<h3>Test Case 3 - Data Lebih Banyak</h3>";

$jsonInput2 = array(
    array("name" => "David", "age" => 17),
    array("name" => "Eva", "age" => 22),
    array("name" => "Frank", "age" => 35),
    array("name" => "Grace", "age" => 19),
    array("name" => "Henry", "age" => 28)
);

$minAge3 = 25;
$filteredData3 = filterByAge($jsonInput2, $minAge3);

echo "<h3>Input JSON:</h3>";
echo "<pre>" . arrayToJson($jsonInput2) . "</pre>";

echo "<h3>Output JSON (usia >= " . $minAge3 . "):</h3>";
echo "<pre>" . arrayToJson($filteredData3) . "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Filter By Age</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        pre { 
            background: #f5f5f5; 
            padding: 15px; 
            border-radius: 5px; 
            border-left: 4px solid #007bff;
        }
        hr { margin: 30px 0; }
    </style>
</head>
<body>
    <h1>PHP Filter By Age</h1>
    <p>Program ini memfilter data JSON berdasarkan usia minimum.</p>
</body>
</html>