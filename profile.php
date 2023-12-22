<?php
include("vendor/autoload.php");

use Helpers\Auth;

$user = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4" style="max-width: 800px;">
        <h1 class="h3 mb-3">Profile</h1>

        <?php if (isset($_GET['error'])) : ?>
            <div class="alert alert-warning">Cannot Upload photo</div>
        <?php endif ?>

        <?php if ($user->photo) : ?>
            <img src="_actions/photos/<?= $user->photo ?>" alt="profile" width="300" class="img-thumbnail">
        <?php endif ?>

        <form action="_actions/upload.php" method="post" enctype="multipart/form-data" class="input-group my-2">
            <input type="file" name="photo" class="form-control">
            <button class="btn btn-secondary">Upload</button>
        </form>

        <ul class="list-group mb-2">
            <li class="list-group-item"><?= $user->name ?></li>
            <li class="list-group-item"><?= $user->email ?></li>
            <li class="list-group-item"><?= $user->phone ?></li>
            <li class="list-group-item"><?= $user->address ?></li>
        </ul>

        <a href="admin.php">Admin</a> |
        <a href="_actions/logout.php" class="text-danger">Logout</a>
    </div>
</body>

</html>