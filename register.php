<?php
// Starten der Session, um Sitzungsdaten zu verwenden
session_start();

// Initialisieren eines leeren Arrays, um die Benutzerinformationen zu speichern
$users = array();

// Überprüfen, ob die Datei 'users.txt' existiert, die die Benutzerdaten speichert
if (file_exists('users.txt')) {
    // Laden des Inhalts der Datei 'users.txt' und Deserialisieren der Daten in ein PHP-Array
    // 'unserialize' konvertiert den gespeicherten String zurück in ein Array
    $users = unserialize(file_get_contents('users.txt'));
}

// Überprüfen, ob das Formular abgeschickt wurde
// Dies wird durch Überprüfen der Anfragemethode festgestellt, ob es sich um eine POST-Anfrage handelt
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Benutzername und Passwort aus den POST-Daten des Formulars extrahieren
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Überprüfen, ob der Benutzername bereits existiert
    $user_exists = false;
    foreach ($users as $user) {
        if ($user['username'] == $username) {
            $user_exists = true;
            break;
        }
    }

    // Wenn der Benutzername bereits existiert, Fehlermeldung anzeigen
    if ($user_exists) {
        echo "Benutzername bereits vergeben!";
    } else {
        // Passwort hashen, um es sicher zu speichern
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // Hinzufügen des neuen Benutzers zum Array der Benutzer
        $users[] = array('username' => $username, 'password' => $hashed_password);

        // Speichern der aktualisierten Benutzerdaten in der Datei 'users.txt'
        file_put_contents('users.txt', serialize($users));

        // Speichern des Benutzernamens in der Session, um den Login-Status zu speichern
        $_SESSION['username'] = $username;
        // Weiterleitung zur Profilseite nach erfolgreicher Registrierung
        header("Location: profile.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <!-- Festlegen des Zeichensatzes für die HTML-Seite -->
    <meta charset="UTF-8">
    <!-- Titel der Seite im Browser-Tab -->
    <title>Registrieren</title>
    <!-- Verlinkung zur externen CSS-Datei für das Styling der Seite -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Hauptcontainer für den Inhalt der Seite -->
    <div class="container">
        <!-- Überschrift für den Registrierungsbereich -->
        <h2>Registrieren</h2>
        <!-- Formular zur Registrierung des Benutzers -->
        <form method="POST">
            <!-- Label und Eingabefeld für den Benutzernamen -->
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" required>
            <!-- Label und Eingabefeld für das Passwort -->
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <!-- Button zum Absenden des Formulars -->
            <button type="submit">Registrieren</button>
        </form>
        <!-- Link zurück zur Startseite oder einem anderen Bereich -->
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>