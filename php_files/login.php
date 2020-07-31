<?php

// $user = $_POST["fridge_id"];
$fridge = $_POST["fridge_id"];
$password = $_POST["pass"];

try{
    //$dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", "$user", "$password");
    $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');

    // $stmt = $dbh->prepare('SELECT * FROM users WHERE fridge_id = :fridge_id');
    $stmt = $dbh->prepare('SELECT * FROM fridges WHERE fridge_id = :fridge_id');

    $stmt->execute(array(':fridge_id' => $_POST['fridge_id']));

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