<?php

class CardData {
    private $data;

    public function __construct(string $jsonFile) {
        $this->loadData($jsonFile);
    }

    private function loadData(string $jsonFile): void {
        $jsonData = file_get_contents($jsonFile);
        $this->data = json_decode($jsonData, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            die("Fehler beim Decodieren der JSON-Datei: " . json_last_error_msg());
        }
    }

    public function getUniqueSortedCategories(): array {
        $categories = array_unique(array_column($this->data, 'category'));
        sort($categories);
        return $categories;
    }

    public function getData(): array {
        return $this->data;
    }
}

class Sanitizer {
    private static $umlaute = [
        'ä' => 'ae', 'ö' => 'oe', 'ü' => 'ue',
        'ß' => 'ss', 'Ä' => 'Ae', 'Ö' => 'Oe', 'Ü' => 'Ue'
    ];

    public static function sanitizeString(string $input): string {
        $output = strtr($input, self::$umlaute);
        $output = str_replace(' ', '_', $output);
        return strtolower($output);
    }
}

class ContentFetcher {
    public static function getContent(string $page): ?string {
        if (!$page) return null;

        $url = 'https://pixmira.com/' . $page;
        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        
        $html = curl_exec($ch);
        curl_close($ch);
        
        if (!$html) return null;

        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);
        libxml_clear_errors();
        
        $element = $dom->getElementById('content');
        return $element ? $dom->saveHTML($element) : null;
    }
}

$jsonFile = __DIR__ . '/../data/cards.json';
$cardData = new CardData($jsonFile);
$data = $cardData->getData();
$categories = $cardData->getUniqueSortedCategories();