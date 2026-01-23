<?php
/*
 * Exposed config file (INTENTIONALLY VULNERABLE)
 * OWASP A05: Security Misconfiguration
 *
 * Anyone can access /config.php and read secrets.
 */

$config = require __DIR__ . '/includes/config.php';

header('Content-Type: application/json');
echo json_encode($config, JSON_PRETTY_PRINT);
