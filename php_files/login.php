<?php

$user = $_POST["user_id"];
$password = $_POST["pass"];

try{
    //$dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "$user", "$password");
    $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "keito", "0531");

    $stmt = $dbh->prepare('SELECT * FROM users WHERE user_id = :user_id');

    $stmt->execute(array(':user_id' => $_POST['user_id']));

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(password_verify($_POST['pass'], $result['password'])){
        echo "ログイン認証に成功しました";
    }else{
        echo "ログイン認証に失敗しました";
    } 

}catch(Exception $e){
    echo "データベースの接続に失敗しました：";
    echo $e->getMessage();
    die();
}

?>