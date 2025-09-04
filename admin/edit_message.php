<?php
session_start();
require '../db.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM messages WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$message = $stmt->get_result()->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $msg = $_POST['message'];
    
    $stmt = $conn->prepare("UPDATE messages SET name=?, email=?, message=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $msg, $id);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Error updating message.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Message</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <header class="admin-header">
        <nav>
            <div class="logo">
                <h2>Edit Message</h2>
            </div>
            <div class="nav-right">
                <a href="dashboard.php" class="nav-btn">Back to Dashboard</a>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
        </nav>
    </header>

    <main class="admin-main">
        <?php if (isset($error)): ?>
            <p class="error"><?= $error ?></p>
        <?php endif; ?>

        <form method="POST" class="project-form">
            <div>
                <label>Name:</label>
                <input type="text" name="name" value="<?= htmlspecialchars($message['name']) ?>" required>
            </div>

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($message['email']) ?>" required>
            </div>

            <div>
                <label>Message:</label>
                <textarea name="message" rows="6" required><?= htmlspecialchars($message['message']) ?></textarea>
            </div>

            <button type="submit" class="nav-btn">Update Message</button>
        </form>
    </main>
</body>

</html>
