<?php
$answers = array(
    'hello' => 'Hello there!',
    'hi' => 'Hi, how can I help you?',
    'hey' => 'Hey, what can I do for you?',
    'how are you' => 'I am doing well, thank you for asking.',
    'how are you doing' => 'I am fine, thanks for asking.',
    'what is your name' => 'My name is Chatboi.',
    'who are you' => 'I am Chatboi, your personal chatbot. You can call me Chatboi, nice to meet you!',
    'what is an array in javascript' => 'An array is a special variable that can hold multiple values in a single variable.',
    'how can i declare an array in javascript' => 'You can declare an array in JavaScript using the following syntax: var arrayName = [value1, value2, value3];',
    'how can i access an array element in javascript' => 'You can access an array element in JavaScript using its index number. For example, arrayName[0] will give you the first element of the array.',
    'how can i add an element to an array in javascript' => 'You can add an element to an array in JavaScript using the push() method. For example, arrayName.push(newValue) will add the newValue to the end of the array.',
    'how can i remove an element from an array in javascript' => 'You can remove an element from an array in JavaScript using the splice() method. For example, arrayName.splice(index, 1) will remove the element at the specified index.',
    'how can i find the length of an array in javascript' => 'You can find the length of an array in JavaScript using the length property. For example, arrayName.length will give you the number of elements in the array.',
    'how can i loop through an array in javascript' => 'You can loop through an array in JavaScript using a for loop. For example, for (var i = 0; i < arrayName.length; i++) { // do something with arrayName[i] }',
    'how can i sort an array in javascript' => 'You can sort an array in JavaScript using the sort() method. For example, arrayName.sort() will sort the elements of the array in alphabetical order.',
    'how can i reverse an array in javascript' => 'You can reverse an array in JavaScript using the reverse() method. For example, arrayName.reverse() will reverse the order of the elements in the array.',
    'how can i join elements of an array into a string in javascript' => 'You can join the elements of an array into a string in JavaScript using the join() method. For example, arrayName.join(", ") will join the elements of the array into a comma-separated string.',
    'how can i convert a string into an array in javascript' => 'You can convert a string into an array in JavaScript using the split() method. For example, var newArray = stringName.split(" "); will split the string into an array of words.',
    'how can i check if a variable is an array in javascript' => 'You can check if a variable is an array in JavaScript using the Array.isArray() method. For example, Array.isArray(arrayName) will return true if arrayName is an array.',
    'how can i copy an array in javascript' => 'You can copy an array in JavaScript using the slice() method. For example, var newArray = arrayName.slice() will create a new array with the same elements as arrayName.',
    'how can i concatenate two arrays in javascript' => 'You can concatenate two arrays in JavaScript using the concat() method. For example, var newArray = arrayName.concat(anotherArray) will create a new array that contains the elements of both arrays.',
    'how can i fill an array with a specific value in javascript' => 'You can fill an array with a specific value in JavaScript using the fill() method. For example, arrayName.fill(0) will fill the array with zeros.',
    'how can i find the index of an element in an array in javascript' => 'You can find the index of an element in an array in JavaScript using the indexOf() method. For example, arrayName.indexOf(searchValue) will return the index of the first element that matches the searchValue.',
    'how can i check if an element is in an array in javascript' => 'You can check if an element is in an array in JavaScript using the includes() method. For example, arrayName.includes(searchValue) will return true if the searchValue is in the array.',
    'how can i remove the last element from an array in javascript' => 'You can remove the last element from an array in JavaScript using the pop() method. For example, arrayName.pop() will remove the last element from the array.',
    'how can i add an element to the beginning of an array in javascript' => 'You can add an element to the beginning of an array in JavaScript using the unshift() method. For example, arrayName.unshift(newValue) will add the newValue to the beginning of the array.',
    'how can i remove the first element from an array in javascript' => 'You can remove the first element from an array in JavaScript using the shift() method. For example, arrayName.shift() will remove the first element from the array.'
);

function sanitizeSearch($search)
{
    // Strip out punctuation, question marks and trailing space from the search string and lowercase it
    $cleanSearch = str_replace(array('?', '!', '.', ','), '', $search);
    $trimmedSearch = trim($cleanSearch);
    $lowercaseSearch = strtolower($trimmedSearch);
    return $lowercaseSearch;
}

function findAnswer($search)
{
    // Make the $answers array available inside the function
    global $answers;

    $sanitizedSearch = sanitizeSearch($search);

    // List all the possible prompts if the user asks for them
    if ($sanitizedSearch == 'what can you answer') {
        return 'I can answer the following prompts: ' . implode(', ', array_keys($answers));
    }

    if (isset($answers[$sanitizedSearch])) {
        return $answers[$sanitizedSearch];
    }

    return "🤷‍♂️";
}
