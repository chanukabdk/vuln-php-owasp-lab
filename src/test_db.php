<?php
require __DIR__ . '/includes/db.php';

$stmt = $pdo->query("SELECT 'Database connected successfully!' AS message");
$result = $stmt->fetch();

echo $result['message'];
