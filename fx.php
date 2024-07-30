<?php

$jsonFile = __DIR__.'/data/cards.json';
$data = json_decode(file_get_contents($jsonFile), true);

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo "Fehler beim Decodieren der JSON-Datei: " . json_last_error_msg();
    exit;
} 

function getUniqueSortedCategories($data) {
    $categories = [];
    foreach ($data as $item) {
        if (!in_array($item['category'], $categories)) {
            $categories[] = $item['category'];
        }
    }
    sort($categories);
    return $categories;
}


function sanitizeString($input) {
    $umlaute = ['ä' => 'ae','ö' => 'oe','ü' => 'ue','ß' => 'ss','Ä' => 'Ae','Ö' => 'Oe','Ü' => 'Ue'];
    $output = strtr($input, $umlaute);
    $output = str_replace(' ', '_', $output);
    $output = strtolower($output);

    return $output;
}
