<?php
// Starten der Session
session_start();

// Initialisieren eines leeren Arrays für Benutzer
$users = array();

// Überprüfen, ob die Datei users.txt existiert und Benutzerdaten laden
if (file_exists('users.txt')) {
    $users = unserialize(file_get_contents('users.txt'));
}

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Benutzername und Passwort aus dem Formular holen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Überprüfen, ob der Benutzer existiert und das Passwort korrekt ist
    foreach ($users as $user) {
        if ($user['username'] == $username && password_verify($password, $user['password'])) {
            // Benutzername in der Session speichern und zur Profilseite weiterleiten
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit;
        }
    }

    // Fehlermeldung, wenn die Anmeldedaten ungültig sind
    echo "Ungültige Anmeldedaten!";
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anmelden</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Anmelden</h2>
        <!-- Formular zur Anmeldung -->
        <form method="POST">
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Anmelden</button>
        </form>
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>