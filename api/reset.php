<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Reset the chat history if the user pressed "Reset"
    $_SESSION["history"] = [];
    // Seems like 205 is the correct response code for this:
    // https://devdocs.io/http/status/205
    http_response_code(205);
    exit();
} else {
    // Only POST is allowed:
    // https://devdocs.io/http/status/405
    http_response_code(405);
    header("Allow: POST");
    exit();
}
