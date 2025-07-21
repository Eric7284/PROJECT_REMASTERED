<?php
// header('Content-Type: text/html; charset=UTF-8');
// koneksi DB — sesuaikan credential Anda
$mysqli = new mysqli('localhost','root','','anime');
if ($mysqli->connect_error) {
    die('<p class="text-danger">Database connection failed.</p>');
}
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']   ?? '');
    $password = $_POST['password']         ?? '';

    if ($username === '' || $password === '') {
        $message = '<div class="alert alert-danger">Username dan password wajib diisi.</div>';
    } else {
        // ambil hash dari DB
        $stmt = $mysqli->prepare("SELECT pass_hash FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows === 0) {
            $message = '<div class="alert alert-danger">Username tidak ditemukan.</div>';
        } else {
            $stmt->bind_result($hash);
            $stmt->fetch();
            if (password_verify($password, $hash)) {
                // promote ke admin
                $upd = $mysqli->prepare("UPDATE users SET roles = 'ADMINISTRATOR' WHERE username = ?");
                $upd->bind_param('s', $username);
                $upd->execute();
                if ($upd->affected_rows > 0) {
                    $message = '<div class="alert alert-success">'
                             . 'User <strong>' . htmlspecialchars($username) . '</strong> berhasil dipromosikan menjadi <em>admin</em>.'
                             . '</div>';
                } else {
                    $message = '<div class="alert alert-warning">User sudah berperan admin.</div>';
                }
                $upd->close();
            } else {
                $message = '<div class="alert alert-danger">Password salah.</div>';
            }
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <title>Promote to Admin (Guest)</title>
</head>
<body class="bg-light text-dark">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <div class="card shadow-sm">
          <div class="card-header text-center">
            <h4 class="mb-0">Promote User to Admin</h4>
          </div>
          <div class="card-body">
            <?php if ($message) echo $message; ?>

            <form method="post" novalidate>
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input
                  type="text"
                  id="username"
                  name="username"
                  class="form-control"
                  placeholder="Masukkan username"
                  required
                />
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input
                  type="password"
                  id="password"
                  name="password"
                  class="form-control"
                  placeholder="Masukkan password"
                  required
                />
              </div>
              <button type="submit" class="btn btn-warning w-100">
                Promote to Admin
              </button>
            </form>

            <hr/>
            <p class="small text-muted">
              ⚠️ Halaman ini terbuka untuk guest—siapa saja bisa mencoba.
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>