<?php
$answers = array(
    'hello' => 'Hello there!',
    'hi' => 'Hi, how can I help you?',
    'hey' => 'Hey, what can I do for you?',
    'how are you' => 'I am doing well, thank you for asking.',
    'how are you doing' => 'I am fine, thanks for asking.',
    'what is your name' => 'My name is Chatboi.',
    'who are you' => 'I am Chatboi, your personal chatbot. You can call me Chatboi, nice to meet you!'
);

function sanitizeSearch($search) {
    // Strip out punctuation, question marks and trailing space from the search string and lowercase it
    $cleanSearch = str_replace(array('?','!','.'), '', $search);
    $trimmedSearch = trim($cleanSearch);
    $lowercaseSearch = strtolower($trimmedSearch);
    return $lowercaseSearch;
}

function findAnswer($search) {
    // Make the $answers array available inside the function
    global $answers;
    
    $sanitizedSearch = sanitizeSearch($search);

    // List all the possible prompts if the user asks for them
    if ($sanitizedSearch == 'what can you answer') {
        return 'I can answer the following prompts:' . implode(', ', array_keys($answers));
    }

    if (isset($answers[$sanitizedSearch])) {
        return $answers[$sanitizedSearch];
    }

    return "Sorry, I don't have an answer to that question.";
}
?>