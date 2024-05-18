<?php
session_start();

// if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
//     header("Location: ./MVC/views/dashboard.php");
//     exit();
// }

$message = isset($_SESSION["message"]) ? $_SESSION["message"] : "";

$email = isset($_SESSION["email_val"]) ? $_SESSION["email_val"] : "";
$email_err = isset($_SESSION["email_err"]) ? $_SESSION["email_err"] : "";

$username = isset($_SESSION["username_val"]) ? $_SESSION["username_val"] : "";
$username_err = isset($_SESSION["username_err"]) ? $_SESSION["username_err"] : "";

$user_type = isset($_SESSION["user_type_val"]) ? $_SESSION["user_type_val"] : "";
$user_type_err = isset($_SESSION["user_type_err"]) ? $_SESSION["user_type_err"] : "";

unset($_SESSION["email_err"]);
unset($_SESSION["username_err"]);
unset($_SESSION["user_type_err"]);
unset($_SESSION["message"]);
unset($_SESSION["email_val"]);
unset($_SESSION["username_val"]);
unset($_SESSION["user_type_val"]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            background-color: ghostwhite;
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-signup {
            display: block;
            text-align: center;
            margin: 10px auto;
            text-decoration: none;
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Central Blood Bank</h2>
        <?php if (!empty($message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="./MVC/controllers/logController.php" method="POST">
            <div class="mb-3">
                <label for="user-type" class="form-label"><b>User Type</b></label>
                <select name="user_type" class="form-select" id="user-type">
                    <option value="">None</option>
                    <option value="admin" <?php echo $user_type === 'admin' ? 'selected' : ''; ?>>Admin</option>
                    <option value="bloodbank" <?php echo $user_type === 'bloodbank' ? 'selected' : ''; ?>>Blood Bank</option>
                    <option value="patient" <?php echo $user_type === 'patient' ? 'selected' : ''; ?>>Patient</option>
                    <option value="donor" <?php echo $user_type === 'donor' ? 'selected' : ''; ?>>Donor</option>
                </select>
                <span class="text-danger"><?php echo $user_type_err; ?></span>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label"><b>Username</b></label>
                <input type="text" name="username" class="form-control" placeholder="Enter your name" id="username" value="<?php echo htmlspecialchars($username); ?>">
                <span class="text-danger"><?php echo $username_err; ?></span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><b>Email</b></label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email" id="email" value="<?php echo htmlspecialchars($email); ?>">
                <span class="text-danger"><?php echo $email_err; ?></span>
            </div>

            <button type="submit" name="login-submit" class="btn btn-primary w-100">Login</button>
        </form>

        <a href="signup.php" class="btn btn-outline-primary btn-signup">Signup</a>
    </div>
</body>

</html>
