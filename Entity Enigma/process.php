<?php
header('Content-Type: application/xml; charset=utf-8');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Invalid request method');
    }

    $xml = $_POST['xml'] ?? '';
    if (empty($xml)) {
        throw new Exception('No XML provided');
    }

    $dom = new DOMDocument();
    @$dom->loadXML($xml, LIBXML_NOENT | LIBXML_DTDLOAD);
    
    if (!$dom->getElementsByTagName('message')->item(0)) {
        throw new Exception('Invalid XML structure - missing message tag');
    }

    // Detect basic XXE without PHP wrapper
    if (strpos($xml, 'php://filter') === false && strpos($xml, 'ENTITY') !== false) {
        $output = '<?xml version="1.0" encoding="UTF-8"?>
<response>
    <status>error</status>
    <message>Try harder!</message>
</response>';
        die($output);
    }

    $message = $dom->getElementsByTagName('message')->item(0)->nodeValue;
    
    $output = '<?xml version="1.0" encoding="UTF-8"?>
<response>
    <status>success</status>
    <message>Comment received: '.htmlspecialchars($message).'</message>
</response>';

    echo $output;

} catch (Exception $e) {
    $errorMessage = htmlspecialchars($e->getMessage());
    echo '<?xml version="1.0" encoding="UTF-8"?>
<response>
    <status>error</status>
    <message>'.$errorMessage.'</message>
</response>';
}
?>
