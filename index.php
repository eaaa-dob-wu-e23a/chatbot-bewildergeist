<?php
include_once("lib/answers.php");

$sitename = "Array.chat()";
$tagline = "All your questions about JavaScript arrays answered!";
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
        <a href="./"><img src="assets/robot-icon.png" alt="Chatbot icon" height="70" /></a>
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
                <!-- This is where the chat messages will go -->
            </ul>
        </section>
        <section>
            <form method="post" id="chat-form">
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