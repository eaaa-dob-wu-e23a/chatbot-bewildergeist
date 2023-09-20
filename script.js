/* Fetch and display chat messages -------------------------------- */
fetch("/api/history.php")
    .then(function (response) {
        if (!response.ok) {
            throw new Error("Failed to fetch chat history");
        }
        return response.json();
    })
    .then(function (qa_pairs) {
        // Loop through the chat messages
        for (const qa_pair of qa_pairs) {
            appendQuestionAndAnswer(qa_pair.question, qa_pair.answer);
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

function appendQuestionAndAnswer(question, answer) {
    const chatMessagesNode = document.querySelector("#chat-messages");
    createAndAppendListItem(question, "user-question", chatMessagesNode);
    createAndAppendListItem(
        // Replace newlines with <br /> tags for better formatting
        answer?.replaceAll("\n", "<br />"),
        "chatbot-answer",
        chatMessagesNode
    );
}

/* Send a chat message -------------------------------------------- */
document
    .querySelector("#chat-form")
    .addEventListener("submit", function (event) {
        const form = event.target;
        // Prevent the browser from submitting the form
        event.preventDefault();
        const formData = new FormData(form);
        fetch("/api/ask.php", {
            method: "POST",
            body: formData,
        })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error("Failed to submit new question");
                }
                return response.json();
            })
            .then(function (qa_pair) {
                appendQuestionAndAnswer(qa_pair.question, qa_pair.answer);
            })
            .then(function () {
                form.reset();
                form.question.focus();
            })
            .catch(function (error) {
                console.error(error);
            });
    });

/* Reset the chat messages ---------------------------------------- */
document
    .querySelector("#reset-form")
    .addEventListener("submit", function (event) {
        // Prevent the browser from submitting the form
        event.preventDefault();
        fetch("/api/reset.php", {
            method: "POST",
        }).then(function (response) {
            if (response.ok) {
                document.querySelector("#chat-messages").innerHTML = "";
            }
        });
    });
