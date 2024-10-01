    <?php
    session_start();
    include("../sql_database/conn.php");

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query 
        $sql = "SELECT * FROM Customers WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];

            // Redirect back to search results page after login
            header("Location: ../pages/searchresults.php");
            exit();
        } else {
            echo "<p>Invalid username or password. Please try again.</p>";
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Login Form</title>
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
        <div class="contWainer">
            <div class="center">
                <h1>Login</h1>
                <form action="" method="POST">
                    <div class="txt_field">
                        <input type="text" name="name" required>
                        <span></span>
                        <label>Username</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" name="password" required>
                        <span></span>
                        <label>Password</label>
                    </div>
                    <input name="submit" type="Submit" value="Login">
                    <div class="signup_link">
                        Not a Member ? <a href="signup.php">Signup</a>
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