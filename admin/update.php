<?php
session_start();
require '../db.php';
if (!isset($_SESSION["admin"])) { header("Location: login.php"); exit; }

$id = $_GET["id"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $stmt = $conn->prepare("UPDATE messages SET message=? WHERE id=?");
    $stmt->bind_param("si", $message, $id);
    $stmt->execute();
    header("Location: dashboard.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM messages WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$msg = $stmt->get_result()->fetch_assoc();
?>
<form method="POST">
  <textarea name="message" rows="5" cols="40"><?= htmlspecialchars($msg['message']) ?></textarea><br>
  <button type="submit">Update</button>
</form>
