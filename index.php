<?php
// Starten der Session, um Sitzungsdaten zu verwenden
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Anmeldung</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Willkommen</h2>
        <?php 
        // Überprüfen, ob ein Benutzer eingeloggt ist
        if (isset($_SESSION['username'])): ?>
            <!-- Wenn Benutzer eingeloggt ist, zeige Profil-Link und Abmelde-Button -->
            <a href="profile.php">Profil</a>
            <form method="POST" action="logout.php">
                <button type="submit">Abmelden</button>
            </form>
        <?php elseif (isset($_SESSION['admin'])): ?>
            <!-- Wenn Admin eingeloggt ist, zeige Admin Dashboard-Link und Abmelde-Button -->
            <a href="admin_dashboard.php">Admin Dashboard</a>
            <form method="POST" action="logout.php">
                <button type="submit">Abmelden</button>
            </form>
        <?php else: ?>
            <!-- Wenn niemand eingeloggt ist, zeige Registrieren-, Anmelden- und Admin-Login-Links -->
            <a href="register.php">Registrieren</a>
            <a href="login.php">Anmelden</a>
            <a href="admin_login.php">Admin Login</a>
        <?php endif; ?>
    </div>
</body>
</html>