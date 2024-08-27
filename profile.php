<?php
// Starten der Session, um Zugriff auf Sitzungsdaten zu erhalten
session_start();

// Überprüfen, ob der Benutzer eingeloggt ist, indem geprüft wird, ob die Sitzungsvariable 'username' gesetzt ist
// Falls der Benutzer nicht eingeloggt ist, wird er zur Anmeldeseite weitergeleitet
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Benutzername aus der Session holen, um ihn auf der Profilseite anzuzeigen
$username = $_SESSION['username'];

// Überprüfen, ob das Formular zur Abmeldung abgeschickt wurde
// Dies wird durch Überprüfen der Anfragemethode festgestellt, ob es sich um eine POST-Anfrage handelt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Zerstören der aktuellen Session, um den Benutzer abzumelden
    session_destroy();
    // Weiterleitung zur Startseite nach der Abmeldung
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Festlegen des Zeichensatzes für die HTML-Seite -->
    <meta charset="UTF-8">
    <!-- Titel der Seite im Browser-Tab -->
    <title>Profil</title>
    <!-- Verlinkung zur externen CSS-Datei für das Styling der Seite -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hauptcontainer für den Inhalt der Seite -->
    <div class="container">
        <!-- Überschrift für den Profilbereich -->
        <h2>Profil</h2>
        <!-- Begrüßung des Benutzers mit seinem Benutzernamen -->
        <p>Willkommen, <?php echo htmlspecialchars($username); ?>!</p>
        <!-- Formular zur Abmeldung des Benutzers -->
        <form method="POST">
            <button type="submit">Abmelden</button>
        </form>
        <!-- Link zurück zur Startseite oder einem anderen Bereich -->
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>