<?php
session_start();

$sessionName = $_SESSION['username'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = htmlspecialchars($_POST['username']);

    $_SESSION['username'] = $username;

    setcookie('username', $username, time() + 3600, '/');

    header("Location: welcome.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Введення імені</title>
</head>
<body>
    <h1>Введіть своє ім'я</h1>

    <?php if ($sessionName): ?>
        <p>Привіт, <?php echo htmlspecialchars($sessionName); ?>!</p>
        <a href="welcome.php">Перейти на сторінку привітання</a>
    <?php else: ?>
        <form action="index.php" method="POST">
            <label for="username">Ім'я користувача:</label>
            <input type="text" id="username" name="username" required>
            <button type="submit">Надіслати</button>
        </form>
    <?php endif; ?>
</body>
</html>