<?php
session_start();

$sitename = "Chatboi";

if (!isset($_SESSION["history"])) {
    $_SESSION["history"] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_question = $_POST["question"];
    $new_answer = "I'm sorry, I don't know the answer to that question.";

    // Add the new question and answer to the $_SESSION["history"] array
    $_SESSION["history"][] = array(
        "question" => $new_question,
        "answer" => $new_answer
    );
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
                <textarea id="question" name="question"></textarea>
                <button type="submit">Ask</button>
            </form>
        </section>
    </main>
</body>

</html>