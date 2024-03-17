<?php

/**
 * Get position of domain in Google search results
 *
 * @param string   $domain Domain to search for
 * @param string   $phrase Search phrase
 * @param int|null $max    Maximum number of search results to check
 *
 * @return int|null Position of domain in search results or null if not found
 */
function get_position(string $domain, string $phrase, ?int $max = 50): int|null
{
    // Prepare phrase for URL
    $phrase = urlencode($phrase);

    // Build request url
    $url = 'https://www.google.com/search?q=' . $phrase . '&num=' . $max;

    // Scrape page with search results
    $response = file_get_contents($url);

    // Parse search results and find domain
    // Load HTML to virtual document
    $dom = new DOMDocument();
    $dom->loadHTML($response, LIBXML_NOWARNING | LIBXML_NOERROR); // Use options to suppress warnings and errors in not-well formatted HTML

    // Find all div elements with search result
    $xpath = new DOMXPath($dom);
    $elements = $xpath->query('//div[@class="BNeawe UPmit AP7Wnd lRVwie"]'); // Find all elements with "BNeawe UPmit AP7Wnd lRVwie" class

    // Loop through all elements and find domain
    foreach ($elements as $index => $element) {
        $text = $element->textContent;
        if (strpos($text, $domain) !== false) {
            return $index + 1;
            break;
        }
    }

    return null;
}

/**
 * Save domain position in search results to database
 *
 * @param string   $domain   Domain to save
 * @param string   $phrase   Phrase to save
 * @param int|null $position Position to save
 *
 * @return bool True if saved successfully, false otherwise
 */
function save_to_database(string $domain, string $phrase, ?int $position = null): bool
{
    include __DIR__  . '/db.php';

    // Save to database
    // Check if site exists
    $sql = "SELECT * FROM sites WHERE domain = '$domain'";

    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        $sql = 'INSERT INTO sites (domain, name, created_at) VALUES ("' . $domain . '", "' . $domain . '", NOW())';

        $conn->query($sql);
    }

    // Check if phrase exists
    $sql = "SELECT * FROM keywords WHERE phrase_name = '$phrase'";

    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        $sql = 'INSERT INTO keywords (phrase_name, created_at) VALUES ("' . $phrase . '", NOW())';

        $conn->query($sql);
    }

    // Get id of site
    $sql = "SELECT id FROM sites WHERE domain = '$domain'";

    $result = $conn->query($sql);

    $site = $result->fetch_assoc();

    $site_id = $site['id'];

    // Get id of phrase
    $sql = "SELECT id FROM keywords WHERE phrase_name = '$phrase'";

    $result = $conn->query($sql);

    $keyword = $result->fetch_assoc();

    $keyword_id = $keyword['id'];

    // Check site_keyword relation id
    $sql = "SELECT id FROM site_keyword WHERE site_id = $site_id AND keyword_id = $keyword_id";

    $result = $conn->query($sql);

    if ($result->num_rows === 0) {
        $sql = 'INSERT INTO site_keyword (site_id, keyword_id) VALUES (' . $site_id . ', ' . $keyword_id . ')';

        $conn->query($sql);
    }

    // Get site_keyword relation id
    $sql = "SELECT id FROM site_keyword WHERE site_id = $site_id AND keyword_id = $keyword_id";

    $result = $conn->query($sql);

    $site_keyword = $result->fetch_assoc();

    $site_keyword_id = $site_keyword['id'];

    // Save found position in results
    $sql = "INSERT INTO results (site_keyword_id, position, created_at) VALUES ($site_keyword_id, ". ($position ? $position : "NULL") . ", NOW())";

    $conn->query($sql);

    return true;
}

$input = [
    'zastavarna-bilina.cz' => [
        'zastavárna Bílina',
        'zastavárna Seifertova',
        'zastavárna Nápravník',
        'zlato Bílina'
    ],
];

foreach ($input as $domain => $phrases) {
    foreach ($phrases as $phrase) {
        $position = get_position($domain, $phrase);
        echo "Position of $domain for phrase $phrase: " . $position . "<br>";

        save_to_database($domain, $phrase, $position);
    }
}