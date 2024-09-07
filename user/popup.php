
    <style>
        /* Popup container - hidden by default */
        .popup {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 85%;
            top: 85%;
            transform: translate(-50%, -50%);
            background-color: #f9f9f9;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Popup close button */
        .close-btn {
            float: right;
            color: #aaa;
            font-size: 24px;
            font-weight: bold;
        }

        .close-btn:hover, .close-btn:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        /* Popup message */
        .popup-message {
            font-size: 18px;
            text-align: center;
        }
    </style>

    <!-- Popup HTML -->
    <div id="popup" class="popup">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <div class="popup-message">
        You have successfully logged in!
        </div>
    </div>

    <script>
        // Function to display the popup
        function showPopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "block";
        }

        // Function to close the popup
        function closePopup() {
            var popup = document.getElementById("popup");
            popup.style.display = "none";
        }

        // Auto-show the popup after a successful login (this can be called after PHP login logic)
        window.onload = function() {
            showPopup();
        };
    </script>

