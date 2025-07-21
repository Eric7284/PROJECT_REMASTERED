<?php
header('Content-Type: application/json');
$mysqli = new mysqli('localhost', 'root', '', 'anime');
if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode([
        'error' => 'Database connection failed']);
    exit;
}

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'null';

/**
 * Fungsi bantu untuk fetch semua baris dalam satu tabel (id + name).
 * $table: nama tabel (string), $idField: nama kolom PK (string), $nameField: nama kolom nama (string)
 */
function fetchAllSimple($mysqli, $table, $idField, $nameField) {
    $arr = [];
    $sql = "SELECT `$idField`, `$nameField` FROM `$table` ORDER BY `$nameField` ASC";
    $res = $mysqli->query($sql);
    if (!$res) {
        return false;
    }
    while ($row = $res->fetch_assoc()) {
        $arr[] = [
            'id'   => $row[$idField],
            'name' => $row[$nameField]
        ];
    }
    return $arr;
}

switch($action){

    case 'get_all_anime':
        $list = fetchAllSimple($mysqli, 'anime', 'anime_id', 'title');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Anime not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;

    case 'get_genres':
        $list = fetchAllSimple($mysqli, 'genre', 'genre_id', 'name');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Genre not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;
    case 'get_voice_actors':
        $list = fetchAllSimple($mysqli, 'voice_actor', 'va_id', 'full_name');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Voice Actor not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;

    case 'get_studios':
        $list = fetchAllSimple($mysqli, 'studio', 'studio_id', 'name');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Studio not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;
    
    case'get_relation_types':
        $list = fetchAllSimple($mysqli, 'relation_type', 'relation_type_id', 'relation_name');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Relation Type not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;
        
    case'get_characters':
        $list = fetchAllSimple($mysqli, 'characters', 'character_id', 'name');
        if ($list === false) {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Data Character not Fetched']);
        } else {
            echo json_encode(['success' => true,'data' => $list]);
        }
        break;

    case 'create_anime':
        //**Pastikan Request Method = POST */
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo json_encode(['success' => false, 'message' => 'Method Not Allowed. Use POST']);
            exit;
        }

        
        //**Ambil field yang dibutuhkan untuk sebuah detail anime */
        $title             = $_POST['title'];
        $type              = $_POST['type'];
        $status            = $_POST['status'];
        $total_eps         = $_POST['total_eps'];
        $synopsis          = $_POST['synopsis'];
        $image_url         = $_POST['image_url'];
        $aired_start_date  = $_POST['aired_start_date']; // format: "YYYY-MM-DD"
        $aired_end_date    = $_POST['aired_end_date'];   // format: "YYYY-MM-DD"
        $season            = $_POST['season'];
        $season_year       = $_POST['season_year'];
        $broadcast_day     = $_POST['broadcast_day'];
        $broadcast_time    = $_POST['broadcast_time'];   // format: "HH:MM"
        $source            = $_POST['source'];
        $demographic       = $_POST['demographic'];
        $content_rating    = $_POST['content_rating'];
        $characters        = $_POST['characters'];       // free-text
        
        //Ambil array yang many-to-many
        //Nama param/paramater di form/disesuaikan dengan nama tabel
        $genre_ids = isset($_POST['genre_ids']) ? $_POST['genre_ids'] : [];
        $voice_actor_ids = isset($_POST['voice_actor_ids']) ? $_POST['voice_actor_ids'] : [];
        $studio_ids = isset($_POST['studio_ids']) ? $_POST['studio_ids'] : [];
        $related_ids = isset($_POST['related_anime_ids']) ? $_POST['related_anime_ids'] : []; // Ambil related_ids jika ada
        // $relation_types = isset($_POST['relation_types']) ? $_POST['relation_types'] : []; // Ambil relation_types jika ada
        $relation_type_id = isset($_POST['relation_type_id']) ? $_POST['relation_type_id'] : null; // Ambil relation_types jika ada
        
        //Memulai Transaksi
        $mysqli->begin_transaction();

        try{// Memasukkan data anime ke tabel anime
            $sqlAnimeINPUT = "
            INSERT INTO anime (title, type, status, total_eps, synopsis, 
            image_url, aired_start_date, aired_end_date, season, 
            season_year, broadcast_day, broadcast_time, source, demographic, 
            content_rating)
            VALUES ('$title', '$type', '$status', $total_eps, '$synopsis',
            '$image_url', '$aired_start_date', '$aired_end_date',
            '$season', $season_year, '$broadcast_day', '$broadcast_time',
            '$source', '$demographic', '$content_rating'
            );
            ";

            if (!$mysqli->query($sqlAnimeINPUT)) {
                throw new Exception('Query INSERT Anime Not Successfully: '.$mysqli->error);
            }
            $newAnimeId = $mysqli->insert_id; // Ambil ID anime yang baru saja dimasukkan
            
            //INSERT data many-to-many ke tabel genre_anime
            if (!empty($genre_ids) && is_array($genre_ids)) {
                foreach ($genre_ids as $genre_id) {
                    $sqlGenreINPUT = "INSERT INTO anime_genre (anime_id, genre_id) VALUES ($newAnimeId, $genre_id);";
                    if (!$mysqli->query($sqlGenreINPUT)) {
                        throw new Exception("Query INSERT Genre Not Successfully: " . $mysqli->error);
                    }
                }
            }

        //INSERT data many-to-many ke tabel voice_actor_anime
        if (!empty($voice_actor_ids) && is_array($voice_actor_ids) && !empty($characters) && is_array($characters) && count($voice_actor_ids) === count($characters)) {
            foreach ($characters as $idx => $character_id) {
                $animeId = (int) $newAnimeId;
                $characterId = (int) $character_id;
                $vaId = (int) $voice_actor_ids[$idx];
                $sqlVoiceActorINPUT = "INSERT INTO characters_voice_actor (anime_id, character_id ,va_id) VALUES ($animeId, $characterId, $vaId);";
                if (!$mysqli->query($sqlVoiceActorINPUT)) {
                    throw new Exception("Query INSERT Voice Actor Not Successfully: " . $mysqli->error);
                }
            }
        }

        //INSERT data many-to-many ke tabel studio_anime
        if (!empty($studio_ids) && is_array($studio_ids)) {
            foreach ($studio_ids as $studio_id) {
                $sqlStudioINPUT = "INSERT INTO anime_studio (anime_id, studio_id) VALUES ($newAnimeId, $studio_id);";
                if (!$mysqli->query($sqlStudioINPUT)) {
                    throw new Exception("Query INSERT Studio Not Successfully: " . $mysqli->error);
                }
            }
        }

        //INSERT data many-to-many ke tabel anime_relation
        if(!empty($related_ids) && is_array($related_ids) && $relation_type_id !== null) {
            $animeId = (int) $newAnimeId;
            $relationTypeId = (int) $relation_type_id;
            foreach ($related_ids as $otherAnimeId) {
                $relatedId = (int) $otherAnimeId;
                if($relatedId == $animeId) {
                    continue; // Abaikan self-relation
                }
                $sqlRelatedINPUT = "INSERT INTO anime_relation (anime_id, related_anime_id, relation_type_id) VALUES ($animeId, $relatedId, $relationTypeId);";
                if (!$mysqli->query($sqlRelatedINPUT)) {
                        error_log("SQL Failed: $sqlRelatedINPUT — Error: " . $mysqli->error);
                    throw new Exception("Query INSERT Related Anime Not Successfully: " . $mysqli->error);
                }
            }
        }
        

        // if(!empty($related_ids) && is_array($related_ids)) {
        //     //Pastikan jumlah related_ids sama dengan jumlah relation_type
        //     $countRelated = count($related_ids);
        //     for ($i = 0; $i < $countRelated; $i++) {
        //         $related_id = $related_ids[$i];
        //         //Ambil tipe relasi, fallback ke 'other' jika tidak ada
        //         $relation_types = isset($relation_type[$i])
        //         ? $mysqli-> real_escape_string($relation_type[$i]) : 'other';

        //         //Abaikan self-relation
        //         if ($related_id == $newAnimeId) {
        //             continue; // Abaikan jika related_id sama dengan newAnimeId
        //         }
        //         $sqlRelatedINPUT = "INSERT INTO anime_relation (anime_id, related_anime_id, relation_type)
        //         VALUES ($newAnimeId, $related_id, '$relation_types');";

        //         if (!$mysqli->query($sqlRelatedINPUT)) {
        //             throw new Exception("Query INSERT Related Anime Not Successfully: " . $mysqli->error);
        //         }
        //     }
        // }
        // Commit transaksi jika semua query berhasil
        $mysqli->commit();

        // Mengembalikan/mengirim response sukses
        echo json_encode([
            'success' => true, 
            'message' => 'Anime created successfully', 
            'anime_id' => $newAnimeId
        ]);
    } 
    catch (Exception $e) {
        // Rollback transaksi jika ada error
        $mysqli->rollback();
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Error: ' . $e->getMessage()
        ]);
    }
break;

default:
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid action. Gunakan action=get_genres|get_voice_actors|get_studios|create_anime'
    ]);
    break;
}
$mysqli->close();
?>