<?php 

require "otp-generate.php";


$number_string = (string)$random_number ; // Convert the number to a string

// Split the string into an array of characters
$number_array = str_split($number_string);


if(isset($_POST['verify'])) {
    $t1 = $_POST['t1'];
    $t1 = $_POST['t2'];
    $t1 = $_POST['t3'];
    $t1 = $_POST['t4'];
    $t1 = $_POST['t5'];

    if($number_array[0] == $t1) {
        if($number_array[1] == $t2) {
            if($number_array[2] == $t3) {
                if($number_array[3] == $t4) {
                    if($number_array[4] == $t5) {
                        header('Location:newPassword.php');
                    }
                }
            }
        }
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="otp.css">
    <title>Document</title>

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
            gap: 30px;
            justify-content: center;
            grid-template-columns: repeat(5, auto);
        }

        .otp-card-inputs input {
            width: 60px;
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

        .otp-card button {
            background-color: blue;
            border: none;
            padding: 15px 50px;
            font-size: 18px;
            color: white;
            border-radius: 20px;
            cursor: pointer;
            margin-top: 15px;
        }

        .otp-card button:hover {
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
        <form action="<?php $_PHP_SELF;?>" method="post">
        <h1>OTP Verification</h1>
        <p>Please type the OTP we have sent to your email</p>
        <div class="otp-card-inputs">
            <input type="text" maxlength="1" autofocus name="t1">
            <input type="text" maxlength="1"  name="t2">
            <input type="text" maxlength="1"  name="t3">
            <input type="text" maxlength="1"  name="t4">
            <input type="text" maxlength="1"  name="t5">
        </div>
        <p>Didn't get the OTP? <a href="#">Resend OTP</a></p>
        <!--<button disabled> Verify</button>-->
        <input type="submit" value="Verify" name="verify">
        </form>
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
    </script>
</body>

</html>