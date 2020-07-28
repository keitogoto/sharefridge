<?php

$user = "ここにユーザー名が入ります";
$password = "ここにパスワードが入ります";

try{

$dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "$user", "$password");

$stmt = $dbh->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");

$stmt->execute(array(':email' => $_POST['email'],':password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)));

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

?>