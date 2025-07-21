<?php
header('Content-Type: application/json');

$mysqli = new mysqli('localhost', 'root', '', 'anime');
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Connection failed: " . $mysqli->connect_error]);
    exit();
}

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
    case 'get_carousel':
        $limit = 5;
        $queryCAROUSEL = "SELECT anime_id, title, image_url, synopsis FROM anime ORDER BY created_at DESC LIMIT $limit";
        $result = $mysqli->query($queryCAROUSEL);
        $carouselDATA = [];
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $carouselDATA[] = [
                    'anime_id' => (int)$row['anime_id'],
                    'title' => $row['title'],
                    'image_url' => $row['image_url'],
                    'synopsis' => $row['synopsis']
                ];
            }
        }
        echo json_encode([
            'success' => true,
            'carousel' => $carouselDATA
        ]);
        break;

        case 'get_schedule':
            $valid_days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $scheduleDATA = [
                'by_day' => ['Monday' => [], 'Tuesday' => [], 'Wednesday' => [], 'Thursday' => [], 'Friday' => [], 'Saturday' => [], 'Sunday' => []],
            ];

            $querySCHEDULE = "SELECT anime_id, title, image_url, synopsis, broadcast_day, broadcast_time FROM anime 
            WHERE status = 'Airing' ORDER BY FIELD(broadcast_day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), broadcast_time ASC";

            $result = $mysqli->query($querySCHEDULE);
            if ($result) {
                while ($row = $result->fetch_assoc()) {
                    $day = $row['broadcast_day'];
                    if (in_array($day, $valid_days, true)) {
                        $scheduleDATA['by_day'][$day][] = [
                            'anime_id' => (int)$row['anime_id'],
                            'title' => $row['title'],
                            'image_url' => $row['image_url'],
                            'synopsis' => $row['synopsis'],
                            'broadcast_time' => $row['broadcast_time']
                        ];
                    }
                }
            }
            echo json_encode([
                'success' => true,
                'schedule' => $scheduleDATA['by_day']
            ]);
            break;

    default:
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => 'Invalid action data'
        ]);
        break;
    }
$mysqli->close();
?>