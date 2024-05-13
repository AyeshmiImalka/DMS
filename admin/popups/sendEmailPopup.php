 <!-- Email Modal -->
 <div class="modal fade" id="emailModal" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="emailModalLabel">Send Email</h5>
                </div>
                <div class="modal-body">
                    <form action="send_email.php" method="post">
                    <input type="hidden" id="email_status" name="email_status">
                        <div class="form-group">
                            <label for="email_address">Recipient Email</label>
                            <input type="email" class="form-control" id="email_address" name="email_address" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email_subject">Subject</label>
                            <input type="text" class="form-control" id="email_subject" name="email_subject" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email_message">Message</label>
                            <textarea class="form-control" id="email_message" name="email_message" rows="3" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="sendButton" disabled>Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Wait for the document to be fully loaded
    document.addEventListener("DOMContentLoaded", function() {
        // Get the message textarea
        var messageTextarea = document.getElementById("email_message");

        // Get the send button
        var sendButton = document.getElementById("sendButton");

        // Add an input event listener to the message textarea
        messageTextarea.addEventListener("input", function() {
            // Check if the message is empty or not
            if (messageTextarea.value.trim() !== "") {
                // If the message is not empty, enable the send button
                sendButton.disabled = false;
            } else {
                // If the message is empty, disable the send button
                sendButton.disabled = true;
            }
        });
    });
</script>


    