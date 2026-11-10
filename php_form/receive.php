<?php
// Module 12 starter: HTML form -> PHP on the server.
// Complete the TODOs after testing GET and POST in DevTools.
$method = $_SERVER['REQUEST_METHOD'];

// TODO 1: For GET, read the displayName value from $_GET.
// TODO 2: For POST, read the displayName value from $_POST.
// Hint: use the null coalescing operator ?? to provide an empty-string default.
$name = '';
if ($method === 'GET') {
$name = $_GET['displayName'] ?? '';
} elseif ($method === 'POST') {
$name = $_POST['displayName'] ?? '';
}
$name = trim($name);
// TODO 3: Remove spaces at the beginning/end using trim().

// This prevents the browser from interpreting the submitted value as HTML.
$safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
$safeMethod = htmlspecialchars($method, ENT_QUOTES, 'UTF-8');
?>
<!doctype html>
<html lang="en">
<head><meta charset="utf-8"><title>PHP Form Receiver</title></head>
<body style="font-family:Arial,sans-serif;max-width:700px;margin:40px auto">
  <h1>Received by PHP</h1>
  <p>Request method: <strong><?= $safeMethod ?></strong></p>
  <p>Display name: <strong><?= $safeName ?></strong></p>
  <p>Data is not stored yet — this is only a receiving demonstration.</p>
  <a href="form.html">Back to form</a>
</body>
</html>
