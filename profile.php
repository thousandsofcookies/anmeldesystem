<?php
// Starten der Session
session_start();

// Überprüfen, ob der Benutzer eingeloggt ist, ansonsten zur Anmeldeseite weiterleiten
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Benutzername aus der Session holen
$username = $_SESSION['username'];

// Überprüfen, ob das Formular zur Abmeldung abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Session zerstören und zur Startseite weiterleiten
    session_destroy();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Profil</h2>
        <!-- Begrüßung des Benutzers mit seinem Benutzernamen -->
        <p>Willkommen, <?php echo htmlspecialchars($username); ?>!</p>
        <!-- Formular zur Abmeldung -->
        <form method="POST">
            <button type="submit">Abmelden</button>
        </form>
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>