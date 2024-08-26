<?php
// Starten der Session
session_start();

// Definieren von Admin-Benutzernamen und Passwort
$admin_username = "admin";
$admin_password = "admin123";  // In der Praxis sollte dies verschlüsselt und sicher gespeichert werden

// Überprüfen, ob das Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Admin-Benutzername und Passwort aus dem Formular holen
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Überprüfen, ob die Admin-Anmeldedaten korrekt sind
    if ($username === $admin_username && $password === $admin_password) {
        // Admin-Benutzername in der Session speichern und zum Admin-Dashboard weiterleiten
        $_SESSION['admin'] = $admin_username;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        // Fehlermeldung, wenn die Admin-Anmeldedaten ungültig sind
        echo "Ungültige Admin-Anmeldedaten!";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Admin Login</h2>
        <!-- Formular zur Admin-Anmeldung -->
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