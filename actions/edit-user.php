<?php

include '../classes/User.php';

$user = new User;

$user_id = $_GET['id'];
$user->editUser($_POST, $_FILES);