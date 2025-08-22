<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION["admin"];
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_pass = $_POST["old_password"];
    $new_pass = $_POST["new_password"];
    $confirm_pass = $_POST["confirm_password"];

    if ($new_pass !== $confirm_pass) {
        $message = "❌ New passwords do not match!";
    } else {
        // Get current hash from DB
        $stmt = $conn->prepare("SELECT password_hash FROM admin_users WHERE username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row && password_verify($old_pass, $row["password_hash"])) {
            $new_hash = password_hash($new_pass, PASSWORD_DEFAULT);
            $update = $conn->prepare("UPDATE admin_users SET password_hash=? WHERE username=?");
            $update->bind_param("ss", $new_hash, $username);

            if ($update->execute()) {
                $message = "✅ Password changed successfully!";
            } else {
                $message = "❌ Error updating password.";
            }
        } else {
            $message = "❌ Old password is incorrect!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="../style.css">
</head>
<body>
  <div class="login-box">
    <h2>Change Password</h2>
    <?php if($message) echo "<p class='info-msg'>$message</p>"; ?>
    <form method="POST" class="loginForm">
      <input type="password" name="old_password" placeholder="Old Password" required><br>
      <input type="password" name="new_password" placeholder="New Password" required><br>
      <input type="password" name="confirm_password" placeholder="Confirm New Password" required><br>
      <button type="submit">Update Password</button>
    </form>
    <p><a href="dashboard.php" class="nav-btn">⬅ Back to Dashboard</a></p>
  </div>
</body>
</html>
