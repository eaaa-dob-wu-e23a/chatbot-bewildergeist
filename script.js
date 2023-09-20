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
