<html>
<body>
<div class="container my-4">
  <h2 class="mb-4">Berita Terbaru</h2>
  <div class="row">
    <?php $db_host = 'localhost';$db_user = 'root';$db_pass = '';$db_name = 'anime';
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    if ($mysqli->connect_error) {
      die("Maaf, terjadi masalah pada server."); 
    }
    $mysqli->set_charset("utf8mb4");
    $sql = "SELECT news_id, title, image_url, summary, published_date FROM news ORDER BY published_date DESC";
    $res = $mysqli->query($sql);
    if ($res === false) {
      die("Error executing query: " . $mysqli->error);
    }
    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {?>
      <div class="col-md-4 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm">
          <?php if (!empty($row['image_url'])): ?>
            <img src="<?= htmlspecialchars($row['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['title']) ?>">
            <?php endif; ?>
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">
                <a href="index.php?page=newsdetail&news_id=<?= $row['news_id'] ?>" class="text-decoration-none">
                  <?= htmlspecialchars($row['title']) ?></a>
                </h5>
                <p class="card-text"><small class="text-muted"><?= date('j F Y', strtotime($row['published_date'])) ?></small></p>
                <?php $summaryNews = mb_strimwidth($row['summary'], 0, 100, '...');?>
                <p class="card-text"><?= htmlspecialchars($summaryNews) ?></p>
            </div>
        </div>
      </div>
      <?php
      }
    }else {
      echo '<div class="col-12"><p class="text-center">Belum ada berita.</p></div>';
    }
    $mysqli->close();
    ?>
  </div>
</div>
</body>
</html>