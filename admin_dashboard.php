<?php
// Starten der Session, um Zugriff auf Sitzungsvariablen zu ermöglichen
session_start();

// Überprüfen, ob der Administrator eingeloggt ist
// Wenn die Sitzungsvariable 'admin' nicht gesetzt ist, wird der Benutzer zur Admin-Anmeldeseite weitergeleitet
if (!isset($_SESSION['admin'])) {
    // Weiterleitung zur Admin-Anmeldeseite, wenn der Benutzer nicht eingeloggt ist
    header("Location: admin_login.php");
    // Beenden des Skripts, um sicherzustellen, dass kein weiterer Code ausgeführt wird
    exit;
}

// Initialisieren eines leeren Arrays, um die Benutzerinformationen zu speichern
$users = array();

// Überprüfen, ob die Datei 'users.txt' existiert, die die Benutzerdaten speichert
if (file_exists('users.txt')) {
    // Laden des Inhalts der Datei 'users.txt' und Deserialisieren der Daten in ein PHP-Array
    // 'unserialize' konvertiert den gespeicherten String zurück in ein Array
    $users = unserialize(file_get_contents('users.txt'));
}

// Überprüfen, ob das Formular zur Abmeldung abgeschickt wurde
// Dies wird durch Überprüfen der Anfragemethode festgestellt, ob es sich um eine POST-Anfrage handelt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Zerstören der aktuellen Session, um den Benutzer abzumelden
    session_destroy();
    // Weiterleitung zur Admin-Anmeldeseite nach der Abmeldung
    header("Location: admin_login.php");
    // Beenden des Skripts nach der Weiterleitung
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Definieren des Zeichensatzes für die HTML-Seite -->
    <meta charset="UTF-8">
    <!-- Titel der Seite im Browser-Tab -->
    <title>Admin Dashboard</title>
    <!-- Verlinkung zur externen CSS-Datei für das Styling der Seite -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hauptcontainer für den Inhalt der Seite -->
    <div class="container">
        <!-- Titel des Admin-Dashboards -->
        <h2>Admin Dashboard</h2>
        <!-- Untertitel, der die Benutzerliste ankündigt -->
        <h3>Benutzerliste</h3>
        <!-- Ungeordnete Liste zur Anzeige aller registrierten Benutzer -->
        <ul>
            <!-- Durchlaufen des Arrays $users und Anzeigen der Benutzernamen -->
            <!-- htmlspecialchars() wird verwendet, um potenzielle XSS-Angriffe zu verhindern -->
            <?php foreach ($users as $user): ?>
                <li><?php echo htmlspecialchars($user['username']); ?></li>
            <?php endforeach; ?>
        </ul>
        <!-- Formular zur Abmeldung des Administrators -->
        <form method="POST">
            <!-- Button zum Absenden des Formulars, das die Abmeldung durchführt -->
            <button type="submit">Abmelden</button>
        </form>
        <!-- Link zurück zur Hauptseite oder einem anderen Bereich -->
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>