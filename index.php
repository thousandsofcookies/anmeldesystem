<?php
// Starten der Session, um Sitzungsdaten zu verwenden
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Festlegen des Zeichensatzes für die HTML-Seite -->
    <meta charset="UTF-8">
    <!-- Titel der Seite im Browser-Tab -->
    <title>Anmeldung</title>
    <!-- Verlinkung zur externen CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hauptcontainer für den Inhalt der Seite -->
    <div class="container">
        <!-- Überschrift für den Willkommensbereich -->
        <h2>Willkommen</h2>
        <?php 
        // Überprüfen, ob ein Benutzer eingeloggt ist (durch Prüfung der Sitzungsvariable 'username')
        if (isset($_SESSION['username'])): ?>
            <!-- Wenn ein Benutzer eingeloggt ist, wird ein Link zum Profil und ein Abmelde-Button angezeigt -->
            <a href="profile.php">Profil</a>
            <form method="POST" action="logout.php">
                <button type="submit">Abmelden</button>
            </form>
        <?php elseif (isset($_SESSION['admin'])): ?>
            <!-- Wenn ein Admin eingeloggt ist (durch Prüfung der Sitzungsvariable 'admin'),
                 wird ein Link zum Admin-Dashboard und ein Abmelde-Button angezeigt -->
            <a href="admin_dashboard.php">Admin Dashboard</a>
            <form method="POST" action="logout.php">
                <button type="submit">Abmelden</button>
            </form>
        <?php else: ?>
            <!-- Wenn niemand eingeloggt ist, werden Links für Registrierung, Benutzeranmeldung und Admin-Login angezeigt -->
            <a href="register.php">Registrieren</a>
            <a href="login.php">Anmelden</a>
            <a href="admin_login.php">Admin Login</a>
        <?php endif; ?>
    </div>
</body>
</html>