<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["reset"])) {
        // Reset the chat history if the user pressed "Reset"
        $_SESSION["history"] = [];
        header("Content-Type: application/json");
        echo json_encode(array(
            "ok" => true,
            "history" => $_SESSION["history"],
        ));
    } else {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(array(
            "ok" => false,
            "error" => "Invalid request",
        ));
    }
}
