<?php
include("../sql_database/conn.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $sql = "INSERT INTO Customers (username, password, phone_number,first_name,last_name) VALUES ('$username', '$password', '$phone_number' , '$first_name' , '$last_name' )";

    if (mysqli_query($conn, $sql)) {
        echo "<p>Signup successful! You can now <a href='login.php'>login</a>.</p>";
    } else {
        echo "<p>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign up</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto;
            background-repeat: no-repeat;
            background-image: url(../img/sky.jpg);
            background-size: cover;
            height: 100vh;
            overflow: hidden;
        }

        .center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 29vw;
            background-color: rgba(255, 255, 255, 0.632);
            border-radius: 10px;
            backdrop-filter: blur(2px)
        }

        .center h1 {
            text-align: center;
            padding: 0 0 20px 0;
            border-bottom: 1px solid silver;
        }

        .center form {
            padding: 0 40px;
            box-sizing: border-box;
        }

        .txt_field {
            position: relative;
            border-bottom: 2px solid #adadad;
            margin: 30px 0;
        }

        .txt_field input {
            width: 100%;
            padding: 0 5px;
            height: 40px;
            font-size: 16px;
            border: none;
            background: none;
            outline: none;
        }

        .txt_field label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: black;
            transform: translateY(-50%);
            font-size: 16px;
            pointer-events: none;
            transition: 0.5s;
        }

        .txt_field span::before {
            content: '';
            position: absolute;
            top: 40px;
            left: 0;
            width: 0px;
            height: 2px;
            background: #2691d9;
            transition: .5s;
        }

        .txt_field input:focus~label,
        .txt_field input:not(:placeholder-shown)~label {
            top: -5px;
            color: #2691d9;
        }

        .txt_field input:focus~span::before,
        .txt_field input:not(:placeholder-shown)~span::before {
            width: 100%;
        }

        input[type="Submit"] {
            width: 100%;
            height: 50px;
            border: 1px solid;
            border-radius: 25px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
        }

        input[type="Submit"]:hover {
            background: #2691d9;
            color: black;
            transition: .5s;
        }

        .login_link {
            margin: 30px 0;
            text-align: center;
            font-size: 16px;
            color: #666666;
        }

        .login_link a {
            color: #2691d9;
            text-decoration: none;
        }

        .login_link a:hover {
            text-decoration: underline;
        }

        .HomeAbout {
            width: 100vw;
            height: 25vh;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="center">
            <h1>Sign up</h1>
            <form action="" method="POST">
                <div class="txt_field">
                    <input type="text" name="username" required placeholder="Enter your Username : ">
                    <span></span>
                    <label>UserName</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" required placeholder="Enter your Password :  ">
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="phone_number" required placeholder="Enter your Phone Number :  ">
                    <span></span>
                    <label>Phone Number</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="first_name" required placeholder="Enter your First Name :  ">
                    <span></span>
                    <label>First Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="last_name" required placeholder="Enter your Last Name :  ">
                    <span></span>
                    <label>Last Name</label>
                </div>
                <input name="submit" type="Submit" value="Sign up">
                <div class="login_link">
                    Already a Member? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // for input anmation 
        const inputs = document.querySelectorAll('.txt_field input');

        inputs.forEach(input => {
            input.addEventListener('blur', () => {
                if (input.value.trim() !== "") {
                    input.classList.add('has-content');
                } else {
                    input.classList.remove('has-content');
                }
            });
        });
    </script>

</body>

</html>