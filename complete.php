<?php
session_start(); // セッションを開始

// セッションからデータを取得
$name   = isset($_SESSION["name"]) ? $_SESSION["name"] : '不明な名前';
$email  = isset($_SESSION["email"]) ? $_SESSION["email"] : '不明なメールアドレス';
$age    = isset($_SESSION["age"]) ? $_SESSION["age"] : '不明な年齢';
$naiyou = isset($_SESSION["naiyou"]) ? $_SESSION["naiyou"] : '不明な内容';

// セッションデータをクリア（完了後は不要なセッションデータを消す）
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録完了</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <h2 class="navbar-brand">登録完了</h2>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="jumbotron">
        <fieldset>
            <legend>登録が完了しました！</legend>
            <p>以下の内容で登録されました。</p>
            <p>名前：<?= htmlspecialchars($name) ?></p>
            <p>Email：<?= htmlspecialchars($email) ?></p>
            <p>年齢：<?= htmlspecialchars($age) ?></p>
            <p>内容：<?= htmlspecialchars($naiyou) ?></p>
            <br>
            <a href="index.php">トップへ戻る</a>
        </fieldset>
    </div>
    <!-- Main[End] -->

</body>

</html>