<?php
include_once("../lib/answers.php");

session_start();

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["question"]) && trim($_POST["question"]) != "") {
        $new_question = $_POST["question"];
        $new_answer = findAnswer($new_question);

        $new_qa_pair = array(
            "question" => $new_question,
            "answer" => $new_answer
        );

        // Add the new question and answer to the chat history
        $_SESSION["history"][] = $new_qa_pair;

        header("Content-Type: application/json");
        // Return the new question and answer
        echo json_encode($new_qa_pair);
        exit();
    } else {
        http_response_code(400);
        header("Content-Type: application/json");
        echo json_encode(array(
            "error" => "Invalid request: Question is required",
        ));
        exit();
    }
} else {
    // Only POST is allowed:
    // https://devdocs.io/http/status/405
    http_response_code(405);
    header("Allow: POST");
    exit();
}
