<?php
$mysqli = new mysqli('localhost','root','','anime');
if ($mysqli->connect_error) {
    die('Database connection failed: '.$mysqli->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name']    ?? '');
    $email   = trim($_POST['email']   ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $msg     = trim($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $subject === '' || $msg === '') {
        $message = '<div class="alert alert-danger">Semua field wajib diisi.</div>';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = '<div class="alert alert-danger">Format email tidak valid.</div>';
    } else {
        $stmt = $mysqli->prepare(
            "INSERT INTO contacts (name, email, subject, message)VALUES (?, ?, ?, ?)");
            $stmt->bind_param('ssss', $name, $email, $subject, $msg);
            if ($stmt->execute()) {
            $message = '<div class="alert alert-success">Terima kasih! Pesan Anda telah terkirim.</div>';
            $name = $email = $subject = $msg = '';
          } else {
            $message = '<div class="alert alert-danger">Gagal mengirim pesan. Silakan ulangi.</div>';
          }
          $stmt->close();
        }
      }?>
<html>
  <head><title>Hubungi Kami</title></head>
  <body class="bg-light text-dark">
    <div class="container py-2">
      <h2 class="mb-2">Hubungi Kami</h2>
      <?php if ($message) echo $message; ?>
      <form method="post" novalidate>
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input type="text" id="name" name="name"class="form-control" value="<?= htmlspecialchars($name ?? '') ?>"required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" name="email"class="form-control" value="<?= htmlspecialchars($email ?? '') ?>"required>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label">Subjek</label>
          <input type="text" id="subject" name="subject"class="form-control" value="<?= htmlspecialchars($subject ?? '') ?>"required>
        </div>
        <div class="mb-4">
          <label for="message" class="form-label">Pesan</label>
          <textarea id="message" name="message" rows="5"class="form-control" required><?= htmlspecialchars($msg ?? '') ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Kirim Pesan</button>
      </form>
    </div>
  </body>
</html>