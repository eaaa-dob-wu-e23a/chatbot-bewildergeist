<?php
$sitename = "Chatboi";
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
                <li class="user-question">
                    <p>What is your name?</p>
                </li>
                <li class="chatbot-answer">
                    <p>My name is Chatboi.</p>
                </li>
                <li class="user-question">
                    <p>What can you do?</p>
                </li>
                <li class="chatbot-answer">
                    <p>I can answer your questions.</p>
                </li>
                <li class="user-question">
                    <p>How old are you?</p>
                </li>
                <li class="chatbot-answer">
                    <p>I don't have an age, I'm a computer program.</p>
                </li>
                <!-- Add more questions and answers here -->
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