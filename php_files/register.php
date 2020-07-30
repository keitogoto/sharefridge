<?php

$user = $_POST["user_id"];
$password = $_POST["pass"];

try{

// $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "$user", "$password");
$dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "keito", "0531");

$stmt = $dbh->prepare("INSERT INTO users (user_id, password) VALUES (:user_id, :password)");

$stmt->execute(array(':user_id' => $_POST['user_id'],':password' => password_hash($_POST['pass'], PASSWORD_DEFAULT)));

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

?>