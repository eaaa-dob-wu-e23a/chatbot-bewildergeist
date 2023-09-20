<?php
include_once("lib/answers.php");

session_start();

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = [];
}

$sitename = "Array.chat()";
$tagline = "All your questions about JavaScript arrays answered!";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["question"]) && trim($_POST["question"]) != "") {
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
        <a href="./"><img src="./assets/robot-icon.png" alt="Chatbot icon" height="70" /></a>
        <a href="./">
            <h1><?php echo $sitename; ?></h1>
            <h2><?php echo $tagline; ?></h2>
        </a>
        <form method="post" class="reset-form" id="reset-form">
            <button type="submit" name="reset" value="reset">Reset</button>
        </form>
    </header>
    <main>
        <section>
            <ul class="chat-messages" id="chat-messages">
                <?php foreach ($_SESSION["history"] as $qa_pair) { ?>
                    <li class="user-question">
                        <p><?php echo $qa_pair["question"]; ?></p>
                    </li>
                    <li class="chatbot-answer">
                        <p><?php echo nl2br($qa_pair["answer"]); ?></p>
                    <?php } ?>
            </ul>
        </section>
        <section>
            <form method="post">
                <input type="text" name="question" autofocus autocomplete="off" list="prompts" />
                <button type="submit">Ask</button>
                <span class="help-text">Type "help" to see what I can answer</span>
            </form>
            <datalist id="prompts">
                <?php foreach (array_keys($answers) as $prompt) { ?>
                    <option value="<?php echo $prompt; ?>">
                    <?php } ?>
            </datalist>
        </section>
    </main>
    <script src="script.js"></script>
</body>

</html>