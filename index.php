<?php
session_start();

$sitename = "Chatboi";

if (!isset($_SESSION["qa_pairs"])) {
    $_SESSION["qa_pairs"] = array(
        array(
            "question" => "What is your name?",
            "answer" => "My name is Chatboi."
        ),
        array(
            "question" => "What can you do?",
            "answer" => "I can answer your questions."
        ),
        array(
            "question" => "How old are you?",
            "answer" => "I don't have an age, I'm a computer program."
        )
        // Add more questions and answers here
    );
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_question = $_POST["question"];
    $new_answer = "I'm sorry, I don't know the answer to that question.";

    // Add the new question and answer to the $_SESSION["qa_pairs"] array
    $_SESSION["qa_pairs"][] = array(
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
            <ul>
                <?php foreach ($_SESSION["qa_pairs"] as $qa_pair) { ?>
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