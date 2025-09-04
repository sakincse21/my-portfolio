<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $query = $conn->prepare("INSERT INTO messages (name, email, message) VALUES (?, ?, ?)");
    $query->bind_param("sss", $name, $email, $message);

    if ($query->execute()) {
        header("Location: index.php?success=1");
    } else {
        echo "Error: " . $query->error;
    }
}
?>
