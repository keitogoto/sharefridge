<?php

// ログインの確認
session_start();
if (!isset($_SESSION["fridge_id"])) {
    // リダイレクト処理
    header('Location: ../html_files/login.html');
}

$fridge_id = $_SESSION["fridge_id"];

// エラーをセッションに格納し、リダイレクトする関数
function error($error)
{
    $_SESSION["error"] = $error;
    // リダイレクト処理
    header('Location: ./error.php');
    exit;
}

// 食材名のバリデーション
function validateName($name)
{
    if (!is_string($name)) {
        error("文字列を入力してください。");
    }
    if (mb_strlen($name) === 0) {
        error("食材名を入力してください。");
    }
}

// 個数のバリデーション
function validateCount($count)
{
    if (!is_string($count)) {
        error("文字列を入力してください。");
    }
    if (mb_strlen($count) === 0) {
        error("個数を入力してください。");
    }
    if (!ctype_digit($count)) {
        error("整数を入力してください。");
    }
    if ((int)$count <= 0) {
        error("1以上の数字を指定してください。");
    }
}

function validateDate($date)
{
    if (!is_string($date)) {
        error("文字列を入力してください。");
    }
    if (mb_strlen($date) === 0) {
        error("期限を入力してください。");
    }
    if (!preg_match('#^[0-9]{4}/[0-9]{2}/[0-9]{2}$#', $date)) {
        error("YYYY/MM/DD形式で入力してください。");
    }
    if ((int)substr($date, 5, 2) <= 0 || (int)substr($date, 5, 2) > 12) {
        error("01~12の月を指定してください。");
    }
    if ((int)substr($date, 8, 2) <= 0 || (int)substr($date, 8, 2) > 31) {
        error("01~31の日にちを指定してください。");
    }
}

// POSTを受け取れているか確認
if (isset($_POST["name"]) && isset($_POST["count"]) && isset($_POST["shomikigen"]) && isset($_POST["shohikigen"])) {

    $name = $_POST["name"];
    $count = $_POST["count"];
    validateName($name);
    validateCount($count);
    validateDate($_POST["shomikigen"]);
    validateDate($_POST["shohikigen"]);
    $shomikigen = str_replace('/', '-', $_POST["shomikigen"]);
    $shohikigen = str_replace('/', '-', $_POST["shohikigen"]);

    try {
        // 食材の登録
        $dbh = new PDO("mysql:host=localhost; dbname=sharefridge; charset=utf8", 'keito', '0531');
        $stmt = $dbh->prepare("INSERT INTO contents VALUES(0, :fridge_id, :name, :count, :shomikigen, :shohikigen)");
        $stmt->execute(array(':fridge_id' => $fridge_id, ':name' => $name, ':count' => $count, ':shomikigen' => $shomikigen, ':shohikigen' => $shohikigen));

        // リダイレクト処理
        header('Location: ./fridge.php');
        exit;
    } catch (Exception $e) {
        echo $e;
    }
}
