<body>
<div class="container my-4">
  <?php
    // cek parameter
    if (!isset($_GET['news_id']) || !is_numeric($_GET['news_id'])) {
      echo '<p class="text-danger">Berita tidak valid.</p>';
      exit;
    }
    $id = (int) $_GET['news_id'];

    // koneksi
    $mysqli = new mysqli('localhost','root','','anime');
    if ($mysqli->connect_error) {
      die("Koneksi gagal: " . $mysqli->connect_error);
    }

    // ambil data berita
    $sql = "SELECT title, image_url, content, published_date
            FROM news
            WHERE news_id = $id
            LIMIT 1";
    $res = $mysqli->query($sql);

    if ($res->num_rows === 0) {
      echo '<p class="text-center">Berita tidak ditemukan.</p>';
    } else {
      $row = $res->fetch_assoc();
      echo '<article>';
        echo '<h1 class="mb-3">'. htmlspecialchars($row['title']) .'</h1>';
        echo '<p class="text-muted mb-4">'. date('j F Y', strtotime($row['published_date'])) .'</p>';
        if (!empty($row['image_url'])) {
          echo '<img src="'. htmlspecialchars($row['image_url']) .'" class="img-fluid mb-4" alt="'. htmlspecialchars($row['title']) .'">';
        }
        // konten lengkap
        echo '<div class="prose">'. nl2br(htmlspecialchars($row['content'])) .'</div>';
      echo '</article>';
    }

    $mysqli->close();
  ?>
  <p class="mt-5">
    <a href="PROJECT_REMASTERED/news" class="btn btn-secondary">&larr; Kembali ke Berita</a>
  </p>
</div>
</body>
</html>