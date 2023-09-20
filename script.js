/* Fetch and display chat messages -------------------------------- */
fetch("/api/history.php")
    .then(function (response) {
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        return response.json();
    })
    .then(function (qa_pairs) {
        const chatMessagesNode = document.querySelector("#chat-messages");
        // Loop through the chat messages
        for (const qa_pair of qa_pairs) {
            // Create a new list item element for the question
            createAndAppendListItem(
                qa_pair.question,
                "user-question",
                chatMessagesNode
            );
            // Create a new list item element for the answer
            createAndAppendListItem(
                // Replace newlines with <br /> tags for better formatting
                qa_pair.answer?.replaceAll("\n", "<br />"),
                "chatbot-answer",
                chatMessagesNode
            );
        }
    })
    .catch(function (error) {
        console.error(error);
    });

function createAndAppendListItem(htmlContent, className, parentElement) {
    // Create a new list item element for the question
    const listItem = document.createElement("li");
    listItem.classList.add(className);
    // Set the text content of the list item to the chat question
    // TODO: Make sure to sanitize the user input
    listItem.innerHTML = htmlContent;
    // Append the list item to the list
    parentElement.appendChild(listItem);
}

/* Reset the chat messages ---------------------------------------- */
document
    .querySelector("#reset-form")
    .addEventListener("submit", function (event) {
        // Prevent the browser from submitting the form
        event.preventDefault();
        // Manually append the submit button's name/value to the form data
        const formData = new FormData(event.target);
        formData.append(event.submitter.name, event.submitter.value);
        fetch("/api/reset.php", {
            method: "POST",
            body: formData,
        })
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if (data.ok) {
                    document.querySelector("#chat-messages").innerHTML = "";
                }
            });
    });
