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

    if (isset($_POST['fetch'])) {
        $url = $_POST['url'];

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
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SSRF Demo</title>
    </head>
    <body>

        <h1>SSRF Demo (Vulnerable)</h1>

        <p>Enter a URL and the server will fetch it. This is intentionally insecure.</p>

        <form method="POST">
            URL:<br>
            <input type="text" name="url" size="60" placeholder="https://example.com"><br><br>
            <input type="submit" name="fetch" value="Fetch">
        </form>

        <hr>

        <?php if ($error): ?>
            <h3>Error</h3>
            <p><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if ($result): ?>
            <h3>Response (raw)</h3>
            <pre><?php echo htmlspecialchars($result); ?></pre>
        <?php endif; ?>

    </body>
</html>
