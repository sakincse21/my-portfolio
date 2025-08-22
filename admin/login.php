<?php
session_start();
require '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM admin_users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row["password_hash"])) {
            $_SESSION["admin"] = $username;
            setcookie("admin", $username, time() + 3600, "/");
            header("Location: dashboard.php");
            exit;
        } else $error = "Invalid password";
    } else $error = "User not found";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <div class="login-body">
    <div class="login-box">
      <h2>Admin Login</h2>
      <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
      <form method="POST" class="loginForm">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
      </form>
      <p><a href="../index.php" class="nav-btn">⬅ Go to Portfolio</a></p>
    </div>
  </div>
</body>
</html>

