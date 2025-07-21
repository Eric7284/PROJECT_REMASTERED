<?php
session_start();
header('Content-Type: application/json');

// CONNECT TO DB — sesuaikan credential Anda
$mysqli = new mysqli('localhost','root','','anime');
if ($mysqli->connect_error) {
  http_response_code(500);
  echo json_encode(['success'=>false,'message'=>'Database connection failed']);
  exit;
}

$action = $_GET['action'] ?? '';

if ($action === 'signup') {
  $input    = json_decode(file_get_contents('php://input'), true);
  $username = trim($input['username'] ?? '');
  $pwd      = $input['password'] ?? '';

  if (!$username || !$pwd) {
    echo json_encode(['success'=>false,'message'=>'All fields are required']);
    exit;
  }
  if (strlen($pwd) < 6) {
    echo json_encode(['success'=>false,'message'=>'Password must be at least 6 characters']);
    exit;
  }

  // Cek duplikat username
  $stmt = $mysqli->prepare("SELECT user_id FROM users WHERE username = ?");
  $stmt->bind_param('s', $username);          // <-- Tipe 's' untuk satu parameter
  $stmt->execute();
  $stmt->store_result();
  if ($stmt->num_rows > 0) {
    echo json_encode(['success'=>false,'message'=>'Username already taken']);
    exit;
  }
  $stmt->close();

  // Simpan dengan default role = 'user'
  $hash = password_hash($pwd, PASSWORD_DEFAULT);
  $defaultRole = 'USERS';
  $stmt = $mysqli->prepare("INSERT INTO users (username,pass_hash) VALUES (?,?)");
  $stmt->bind_param('ss', $username, $hash);
  if ($stmt->execute()) {
    echo json_encode(['success'=>true,'message'=>'Account created successfully']);
  } else {
    echo json_encode(['success'=>false,'message'=>'Database error']);
  }
  exit;

} elseif ($action === 'login') {
  $input    = json_decode(file_get_contents('php://input'), true);
  $username = trim($input['username'] ?? '');
  $pwd      = $input['password'] ?? '';

  if (!$username || !$pwd) {
    echo json_encode(['success'=>false,'message'=>'All fields are required']);
    exit;
  }

  // Ambil id, hash, dan role
  $stmt = $mysqli->prepare(
    "SELECT user_id, pass_hash, roles
     FROM users
     WHERE username = ?"
  );
  $stmt->bind_param('s', $username);          // <-- juga hanya satu 's'
  $stmt->execute();
  $stmt->store_result();

  if ($stmt->num_rows === 0) {
    echo json_encode(['success'=>false,'message'=>'Invalid credentials']);
    exit;
  }

  $stmt->bind_result($id, $hash, $role);
  $stmt->fetch();

  if (password_verify($pwd, $hash)) {
    // Sukses: simpan ke session
    $_SESSION['user_id']   = $id;
    $_SESSION['username']  = $username;
    $_SESSION['user_role'] = $role;            // <-- 'user' atau 'admin'
    echo json_encode(['success'=>true,'message'=>'Login successful']);
  } else {
    echo json_encode(['success'=>false,'message'=>'Invalid credentials']);
  }
  exit;

} else {
  http_response_code(400);
  echo json_encode(['success'=>false,'message'=>'Unknown action']);
  exit;
}
?>