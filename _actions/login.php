<?php
include("../vendor/autoload.php");

use Faker\Provider\HtmlLorem;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\HTTP;



$table = new UsersTable(new MySQL);
$email = $_POST['email'];
$password = $_POST['password'];

$user = $table->fundByEmailAndPassword($email, $password);

if ($user) {

    if($user->suspended){
        HTTP::redirect("/index.php","suspend=true");
    }

    session_start();
    $_SESSION['user'] = $user;
    HTTP::redirect("/profile.php");
} else {
    HTTP::redirect("/index.php", "incorrect=login");
}
