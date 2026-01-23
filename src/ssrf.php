<?php
/*
 * SSRF Lab Endpoint (INTENTIONALLY INSECURE)
 *
 * What it does:
 * - Takes a user-supplied URL
 * - Fetches it server-side
 * - Displays the response
 *
 * Vulnerability:
 * - No allowlist / no filtering / no network restrictions
 * - Users can force the server to request internal services
 */

    $result = "";
    $error = "";
    $debug  = "";

    /**
    * Naive SSRF "protection" (INTENTIONALLY WEAK)
    * This checks if the URL string contains certain blocked tokens.
    * Real SSRF defenses require stronger controls (allowlists, DNS/IP checks, egress rules, etc.)
    */
    function naive_blocklist_check(string $url): bool
    {
        $blocked = [
            "localhost",
            "127.0.0.1",
            "0.0.0.0",
            "169.254.169.254",
            "db",              
            "php",
            "nginx"
        ];

        $lower = strtolower($url);

        foreach ($blocked as $token) {
            if (strpos($lower, $token) !== false) {
                return true; // block
            }
        }
        return false; // allow
    }

    if (isset($_POST['fetch'])) {
        $url = $_POST['url'];

        if (naive_blocklist_check($url)) {
            $error = "Blocked by naive SSRF filter (substring match).";
            $debug = "Reason: URL contained a blocked token (string-based filtering).";
        } else {
            // Basic fetch (works with default PHP builds if allow_url_fopen is enabled)
            $context = stream_context_create([
                'http' => [
                    'method'  => 'GET',
                    'timeout' => 5
                ]
            ]);

            $response = @file_get_contents($url, false, $context);

            if ($response === false) {
                $error = "Fetch failed (server could not retrieve the URL).";
            } else {
                $result = $response;
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SSRF Demo</title>
    </head>
    <body>

        <h1>SSRF Demo (Vulnerable + Naive Filter)</h1>

        <p>
            Enter a URL and the server will fetch it. This is intentionally insecure.
            A naive substring-based filter is included to demonstrate weak SSRF defenses.
        </p>

        <form method="POST">
            URL:<br>
            <input type="text" name="url" size="60" placeholder="https://example.com"><br><br>
            <input type="submit" name="fetch" value="Fetch">
        </form>

        <hr>

        <?php if ($error): ?>
            <h3>Error</h3>
            <p><?php echo htmlspecialchars($error); ?></p>

            <?php if ($debug): ?>
                <p><em><?php echo htmlspecialchars($debug); ?></em></p>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($result): ?>
            <h3>Response (raw)</h3>
            <pre><?php echo htmlspecialchars($result); ?></pre>
        <?php endif; ?>

    </body>
</html>
