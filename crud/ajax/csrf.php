<?php
header('Content-Type: application/json');

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf-token'] = bin2hex(random_bytes(32));
}

if (!function_exists('apache_request_headers')) {
  function apache_request_headers()
  {
    foreach ($_SERVER as $key => $value) {
      if (substr($key, 0, 5) == "HTTP_") {
        $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key, 5)))));
        $out[$key] = $value;
      } else {
        $out[$key] = $value;
      }
    }
    return $out;
  }
}

// Here is the resource to solve PHP Fatal error:  Uncaught Error: Call to undefined function apache_request_headers()
// Resources: https://www.php.net/manual/en/function.apache-request-headers.php

if (isset($headers['Csrf-Token'])) {
  if ($headers['Csrf-Token'] !== $_SESSION['csrf_token']) {
    exit(json_encode(['error' => 'Wrong CSRF token']));
  } else {
    exit(json_encode(['error' => 'No CSRF token']));
  }
}
