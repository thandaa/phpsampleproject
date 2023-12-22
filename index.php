<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4 text-center" style="max-width: 400px;">
        <h1 class="h3 mb-4">Login</h1>

        <?php if (isset($_GET['incorrect'])) : ?>
            <div class="alert alert-warning">
                Incorrect email or password
            </div>
        <?php endif ?>

        <?php if (isset($_GET['suspend'])) : ?>
            <div class="alert alert-danger">
                Account Suspended.
            </div>
        <?php endif ?>

        <?php if (isset($_GET['register'])) : ?>
            <div class="alert alert-info">
                Register success, Please Login.
            </div>
        <?php endif ?>

        <form action="_actions/login.php" method="post">
            <input type="text" class="form-control mb-2" name="email" placeholder="Email">
            <input type="password" class="form-control mb-2" name="password" placeholder="Passwod"><button class="btn btn-primary w-100">Login</button>
        </form>
        <br>
        <a href="register.php">Register</a>
    </div>
</body>

</html>