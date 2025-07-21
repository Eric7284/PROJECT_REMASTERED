<?php
header('Content-Type: application/json;');

$mysqli = new mysqli('localhost', 'root', '', 'anime');
if ($mysqli->connect_error){
    http_response_code(500);
    echo json_encode(['success'=>false,'error'=>'Database not connected: '.$mysqli->connect_error]);
    exit;
}

$id = isset($_GET['anime_id']) ? $_GET['anime_id'] : '';
if ($id === ''){
    http_response_code(400);
    echo json_encode(['success'=>false,'error'=>'Parameter id wajib diisi']);
    exit;
}

$sqls = [
    'data' => "SELECT anime_id, title, type, total_eps, status,synopsis, image_url, aired_start_date,aired_end_date,
    season, season_year, score, broadcast_time, content_rating, source
    FROM anime
    WHERE anime_id = '$id'",
    'genres' => "SELECT genre.genre_id, genre.name
    FROM genre JOIN anime_genre ON genre.genre_id = anime_genre.genre_id
    WHERE anime_genre.anime_id = '$id'",
    'studios' => "SELECT studio.studio_id, studio.name
    FROM studio JOIN anime_studio ON studio.studio_id = anime_studio.studio_id
    WHERE anime_studio.anime_id = '$id'",
    'voice_actors' => "SELECT voice_actor.va_id, voice_actor.full_name, voice_actor.img_url, voice_actor.language
    FROM voice_actor JOIN characters_voice_actor ON voice_actor.va_id = characters_voice_actor.va_id
    WHERE characters_voice_actor.anime_id = '$id'",

    'related_anime' => "SELECT anime_relation.related_anime_id, relation_type.relation_name, anime.title AS related_title, anime.image_url AS related_image
    FROM anime_relation
    JOIN relation_type ON anime_relation.relation_type_id = relation_type.relation_type_id
    JOIN anime ON anime_relation.related_anime_id = anime.anime_id
    WHERE anime_relation.anime_id = '$id'",

    'characters' => "SELECT characters.character_id, characters.name, characters.role, characters.img_url
    FROM characters JOIN characters_voice_actor ON characters.character_id = characters_voice_actor.character_id
    WHERE characters_voice_actor.anime_id = '$id'",

    'gallery_detail' => "SELECT gallery_id, image_url, title
    FROM gallery_detail
    WHERE anime_id = '$id'",

    'opening' => "SELECT title, artist, eps_start, eps_end, url_theme FROM theme WHERE anime_id = '$id' AND type = 'opening'",
    'ending' => "SELECT title, artist, eps_start, eps_end, url_theme FROM theme WHERE anime_id = '$id' AND type = 'ending'"
    ];

$resultData = [];
foreach ($sqls as $key => $sql) {
    $res = $mysqli->query($sql);
    if (! $res) {
        http_response_code(500);
        echo json_encode(['success'=>false,'error'=>$mysqli->error]);
        error_log("Running SQL for key “{$key}”: {$sql}");
        exit;
    }
    if ($key === 'data') {
        if ($res->num_rows === 0) {
            http_response_code(404);
            echo json_encode(['success'=>false,'error'=>'Anime tidak ditemukan']);
            exit;
        }
        $resultData = $res->fetch_assoc();
    } else {
        $resultData[$key] = [];
        while ($row = $res->fetch_assoc()) {
            $resultData[$key][] = $row;
        }
    }
}
echo json_encode([
    'success'=>true,
    'data'=>$resultData]);
?>