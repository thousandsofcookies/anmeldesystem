<?php
// Starten der Session, um Zugriff auf die aktuellen Sitzungsdaten zu erhalten
session_start();

// Zerstören der Session, um alle Sitzungsdaten zu löschen und den Benutzer abzumelden
session_destroy();

// Weiterleitung zur Startseite nach der Abmeldung
header("Location: index.php");
// Beenden des Skripts, um sicherzustellen, dass kein weiterer Code ausgeführt wird
exit;
?>