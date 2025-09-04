<?php
session_start();
require '../db.php';

if (isset($_SESSION["admin"])) {
    header("Location: dashboard.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = $conn->prepare("SELECT * FROM admin_users WHERE username=?");
    $query->bind_param("s", $username);
    $query->execute();
    $result = $query->get_result();

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
        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
      </form>
      <p><a href="../index.php" class="nav-btn">⬅ Go to Portfolio</a></p>
    </div>
  </div>
</body>
</html>

