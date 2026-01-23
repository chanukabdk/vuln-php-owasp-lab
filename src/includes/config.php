<?php
/*
 * Application configuration (INTENTIONALLY INSECURE LAB)
 * In real apps, secrets should not live in web root, nor be committed to GitHub.
 */

return [
    'db_host' => 'db',
    'db_name' => 'vuln_app',
    'db_user' => 'vuln_user',
    'db_pass' => 'vuln_pass',
    'db_charset'=> 'utf8mb4',
];
