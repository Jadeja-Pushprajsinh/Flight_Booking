<?php
include("../sql_database/conn.php");
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone_number = $_POST['phone_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Insert new user into the Customers table
    $sql = "INSERT INTO Customers (username, password, phone_number, first_name, last_name) 
            VALUES ('$username', '$password', '$phone_number', '$first_name', '$last_name')";

    if (mysqli_query($conn, $sql)) {
        // Retrieve the newly created user ID
        $user_id = mysqli_insert_id($conn);

        // Set session variables to log the user in immediately after signup
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;

        // Redirect to searchresults.php after successful signup and login
        header("Location: login.php");
        exit();
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
    <!-- Add your styling here -->
</head>
<body>
    <div class="container">
        <div class="center">
            <h1>Sign up</h1>
            <form action="" method="POST">
                <div class="txt_field">
                    <input type="text" name="username" required placeholder="Enter your Username : ">
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password" required placeholder="Enter your Password : ">
                    <span></span>
                    <label>Password</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="phone_number" required placeholder="Enter your Phone Number : ">
                    <span></span>
                    <label>Phone Number</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="first_name" required placeholder="Enter your First Name : ">
                    <span></span>
                    <label>First Name</label>
                </div>
                <div class="txt_field">
                    <input type="text" name="last_name" required placeholder="Enter your Last Name : ">
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