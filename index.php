<?php
include_once("lib/answers.php");

session_start();

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = [];
}

$sitename = "Array.chat()";
$tagline = "All your questions about JavaScript arrays answered!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["reset"])) {
        // Reset the chat history if the user pressed "Reset"
        $_SESSION["history"] = [];
        header("Location: /");
        exit();
    } else if (isset($_POST["question"]) && trim($_POST["question"]) != "") {
        // Otherwise, answer the users question
        $new_question = $_POST["question"];
        $new_answer = findAnswer($new_question);

        // Add the new question and answer to the chat history
        $_SESSION["history"][] = array(
            "question" => $new_question,
            "answer" => $new_answer
        );
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $sitename; ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h1><?php echo $sitename; ?></h1>
        <h2><?php echo $tagline; ?></h2>
        <form method="post" class="reset-form">
            <button type="submit" name="reset">Reset</button>
        </form>
    </header>
    <main>
        <section>
            <ul class="chat-messages">
                <?php foreach ($_SESSION["history"] as $qa_pair) { ?>
                    <li class="user-question">
                        <p><?php echo $qa_pair["question"]; ?></p>
                    </li>
                    <li class="chatbot-answer">
                        <p><?php echo $qa_pair["answer"]; ?></p>
                    </li>
                <?php } ?>
            </ul>
        </section>
        <section>
            <form method="post">
                <input type="text" name="question" autofocus />
                <button type="submit">Ask</button>
                <span class="help-text">Type "help" to see what I can answer</span>
            </form>
        </section>
    </main>
</body>

</html>