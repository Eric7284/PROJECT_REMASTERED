<?php
header('Content-Type: application/json;');

$mysqli = new mysqli('localhost', 'root', '', 'anime');
if ($mysqli->connect_error){
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database not connected: '. $mysqli->connect_error
    ]);
    exit;
}

$category = isset($_GET['category']) ? $_GET['category'] : 'all';

switch($category){
    case 'all':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'airing':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.status = 'airing'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'upcoming':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.status = 'not yet aired'
    GROUP BY anime.anime_id
    ORDER BY anime.aired_start_date ASC";
    break;

    case 'tv':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.type = 'tv'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'movie':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.type = 'movie'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'ova':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.type = 'ova'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'ona':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.type = 'ona'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;

    case 'special':
    $sql = "SELECT anime.anime_id, anime.title, anime.image_url, anime.type,
    anime.total_eps, anime.aired_start_date, anime.aired_end_date,
    anime.status, anime.score, GROUP_CONCAT(studio.name SEPARATOR ', ') AS studios
    FROM anime
    LEFT JOIN anime_studio ON anime.anime_id = anime_studio.anime_id
    LEFT JOIN studio ON anime_studio.studio_id = studio.studio_id
    WHERE anime.type = 'special'
    GROUP BY anime.anime_id
    ORDER BY anime.score DESC";
    break;
    
    default:
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'error'   => "Invalid category: {$category}"
    ]);
    exit;
}

$result = $mysqli->query($sql);
if (! $result) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error'   => $mysqli->error
    ]);
    exit;
}

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode([
    'success' => true,
    'data'    => $data
]);
?>