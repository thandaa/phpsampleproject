<?php

require('../vendor/autoload.php');

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;
use Helpers\Auth;

$auth = Auth::check();

$table = new UsersTable(new MySQL);

$name = $_FILES['photo']['name'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];
$photoname = $auth->name.".jpg";

if ($type == "image/jpeg" || $type == "image/png") {
    move_uploaded_file($tmp, "photos/$photoname");

    $table->updatePhoto($auth->id, $name);

    $auth->photo = $name;

    HTTP::redirect('/profile.php');
} else {

    HTTP::redirect("/profile.php", "error=type");
}
