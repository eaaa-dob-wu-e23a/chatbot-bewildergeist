<?php
session_start();

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = [];
}

header("Content-Type: application/json");

echo json_encode($_SESSION["history"]);
