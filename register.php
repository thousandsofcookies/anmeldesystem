<?php
// Starten der Session, um Sitzungsdaten zu verwenden
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
        // Passwort hashen und neuen Benutzer speichern
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $users[] = array('username' => $username, 'password' => $hashed_password);

        // Benutzerdaten in Datei speichern
        file_put_contents('users.txt', serialize($users));

        // Benutzername in der Session speichern und zur Profilseite weiterleiten
        $_SESSION['username'] = $username;
        header("Location: profile.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrieren</title>
    <!-- Verlinkung zur CSS-Datei für das Seitenlayout -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registrieren</h2>
        <!-- Formular zur Registrierung -->
        <form method="POST">
            <label for="username">Benutzername:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Registrieren</button>
        </form>
        <a href="index.php">Zurück</a>
    </div>
</body>
</html>