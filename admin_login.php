<?php
// Starten der Session, um Sitzungsdaten zu verwenden oder zu erstellen
session_start();

// Definieren von Admin-Benutzernamen und Passwort
// Diese Anmeldedaten sind fest codiert, was in einer realen Anwendung unsicher ist.
// In der Praxis sollten solche Daten verschlüsselt und in einer sicheren Datenbank gespeichert werden.
$admin_username = "admin";
$admin_password = "admin123";  // In der Praxis sollte dies verschlüsselt und sicher gespeichert werden

// Überprüfen, ob das Formular abgeschickt wurde
// Dies wird durch Überprüfen der Anfragemethode festgestellt, ob es sich um eine POST-Anfrage handelt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Admin-Benutzername und Passwort aus den POST-Daten des Formulars extrahieren
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Überprüfen, ob die eingegebenen Anmeldedaten mit den festgelegten Admin-Daten übereinstimmen
    if ($username === $admin_username && $password === $admin_password) {
        // Speichern des Admin-Benutzernamens in der Session, um den Login-Status zu speichern
        $_SESSION['admin'] = $admin_username;
        // Weiterleitung zum Admin-Dashboard, wenn die Anmeldedaten korrekt sind
        header("Location: admin_dashboard.php");
        // Beenden des Skripts nach der Weiterleitung, um zu verhindern, dass weiterer Code ausgeführt wird
        exit;
    } else {
        // Ausgabe einer Fehlermeldung, wenn die Anmeldedaten ungültig sind
        echo "Ungültige Admin-Anmeldedaten!";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Definieren des Zeichensatzes für die HTML-Seite -->
    <meta charset="UTF-8">
    <!-- Titel der Seite im Browser-Tab -->
    <title>Admin Login</title>
    <!-- Verlinkung zur externen CSS-Datei für das Styling der Seite -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hauptcontainer für den Inhalt der Seite -->
    <div class="container">
        <!-- Titel des Admin-Login-Bereichs -->
        <h2>Admin Login</h2>
        <!-- Formular zur Admin-Anmeldung -->
        <form method="POST">
            <!-- Label und Eingabefeld für den Benutzernamen -->
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" required>
            <!-- Label und Eingabefeld für das Passwort -->
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <!-- Button zum Absenden des Formulars -->
            <button type="submit">Anmelden</button>
        </form>
        <!-- Link zurück zur Hauptseite oder einem anderen Bereich -->
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>