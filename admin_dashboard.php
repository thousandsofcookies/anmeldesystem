<?php
// Starten der Session
session_start();

// Überprüfen, ob der Admin eingeloggt ist, ansonsten zur Admin-Anmeldeseite weiterleiten
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}

// Initialisieren eines leeren Arrays für Benutzer
$users = array();

// Überprüfen, ob die Datei users.txt existiert und Benutzerdaten laden
if (file_exists('users.txt')) {
    $users = unserialize(file_get_contents('users.txt'));
}

// Überprüfen, ob das Formular zur Abmeldung abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Session zerstören und zur Admin-Anmeldeseite weiterleiten
    session_destroy();
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Dashboard</h2>
        <h3>Benutzerliste</h3>
        <!-- Auflistung aller registrierten Benutzer -->
        <ul>
            <?php foreach ($users as $user): ?>
                <li><?php echo htmlspecialchars($user['username']); ?></li>
            <?php endforeach; ?>
        </ul>
        <!-- Formular zur Abmeldung -->
        <form method="POST">
            <button type="submit">Abmelden</button>
        </form>
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>