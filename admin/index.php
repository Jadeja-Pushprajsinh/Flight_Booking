<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login Form</title>
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
            height: 22vw;
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
        .HomeAbout {
            width: 100vw;
            height: 25vh;
        }
    </style>
</head>
<body>
    <div class="contWainer">
        <div class="center">
            <h1>Admin Login</h1>
            <form action="./processes/admin-process.php" method="POST">
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
                
            </form>
        </div>
    </div>

    <script>
        // for input animation 
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
