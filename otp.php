<?php 

session_start();






if(isset($_POST['verify'])) {
    $user_otp = $_POST['user_otp'];

    if($_SESSION['key'] == $user_otp) {
        //session_unset();
        //session_destroy();
        header("Location:newPassword.php");
    } else {
        echo "<script>alert('OTP Verification Failed!!')</script>";
    }

}


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="otp.css">
    <title>OTP - Confirmation</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap');

        * {
            box-sizing: border-box;

        }

        h1 {
            margin: 0;
            color: blue;
        }

        body {
            font-family: 'poppins', sans-serif;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .otp-card {
            text-align: center;
            background-color: rgb(251, 245, 237);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 10px 40px -20px black;
        }

        .otp-card-inputs {
            margin: 30px 0;
            display: grid;
            justify-content: center;
            grid-template-columns: repeat(5, auto);
        }

        .otp-card-inputs input {
            width: auto;
            height: 70px;
            font-size: 35px;
            text-align: center;
            border-radius: 10px;
            border: 1px solid black;
        }

        .otp-card-input input:focus {
            outline: 2px solid blue;
            border-color: transparent;
        }

        .btn {
            background-color: blue;
            border: none;
            padding: 15px 50px;
            font-size: 18px;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn:hover {
            opacity: .9;
            background-color: blueviolet;
        }

        .otp-card button[disabled] {
            opacity: .9;
            cursor: default;
        }
    </style>

</head>

<body>
    <div class="otp-card">
        <form action="<?php $_PHP_SELF;?>" method="POST">
        <h1>OTP Verification</h1>
        <p>Please type the OTP we have sent to your email</p>
        <div class="otp-card-inputs">
            <input type="text" maxlength="5" autofocus name="user_otp">
        </div>
        <p>Didn't get the OTP? <a href="otp-resend.php">Resend OTP</a></p>
        <!--<button disabled> Verify</button>-->
        <input type="submit" value="Verify" name="verify" class="btn">
        </form>
        <h3 id="countdown"><!--Countdown display--></h3>
    </div>
    <script>
        const inputs = document.querySelectorAll('.otp-card-inputs input');
        const button = document.querySelector('.otp-card button');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                const currentInput = e.target;
                const nextInput = inputs[index + 1];
                const prevInput = inputs[index - 1];

                if (e.inputType === 'deleteContentBackward' && prevInput) {
                    prevInput.value = '';
                    prevInput.focus();
                }

                if (currentInput.value !== '' && nextInput) {
                    nextInput.focus();
                }

                let allFilled = true;
                inputs.forEach(input => {
                    if (input.value === '') {
                        allFilled = false;
                    }
                });

                if (allFilled) {
                    button.removeAttribute('disabled');
                } else {
                    button.setAttribute('disabled', true);
                }
            });
        });



        //countdown for otp confirmation
        // Function to start the countdown and redirect after 3 minutes
        function startCountdown() {
            var countdownElement = document.getElementById("countdown");
            var countdownTime = 3 * 60; // 3 minutes in seconds

            var countdownInterval = setInterval(function() {
                var minutes = Math.floor(countdownTime / 60);
                var seconds = countdownTime % 60;

                countdownElement.innerHTML = "Time Left - " + minutes + "m " + seconds + "s ";

                if (countdownTime <= 0) {
                    clearInterval(countdownInterval);
                    window.location.href = "login_form.php"; // Redirect after countdown finishes
                    console.log(<?php $_SESSION['notice'] = "Your OTP Confirmation is timeout. Try Again."; ?>);
                }

                countdownTime--;
            }, 1000); // Update every second
        }

        // Start the countdown when the page loads
        startCountdown();
    </script>
</body>

</html>