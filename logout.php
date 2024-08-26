<?php
// Starten der Session
session_start();

// Zerstören der Session, um den Benutzer abzumelden
session_destroy();

// Weiterleitung zur Startseite
header("Location: index.php");
exit;
?>