<?php
//  ../ -go outside the current folder   
include '../classes/User.php';

// object
$user = new User;

// $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$user->signUp($_POST);   //function signUp in User.php

// print_r($_POST);   //入力した内容が表示される。
