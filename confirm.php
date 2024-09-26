<?php
// POSTデータを受け取る
$name   = $_POST["name"];
$email  = $_POST["email"];
$age    = $_POST["age"];
$naiyou = $_POST["naiyou"];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ確認</title>
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
                    <h2 class="navbar-brand">アンケート確認</h2>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div class="jumbotron">
        <fieldset>
            <legend>確認画面</legend>
            <p>名前：<?= htmlspecialchars($name) ?></p>
            <p>Email：<?= htmlspecialchars($email) ?></p>
            <p>年齢：<?= htmlspecialchars($age) ?></p>
            <p>内容：<?= htmlspecialchars($naiyou) ?></p>

            <form method="POST" action="insert.php">
                <input type="hidden" name="name" value="<?= htmlspecialchars($name) ?>">
                <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
                <input type="hidden" name="age" value="<?= htmlspecialchars($age) ?>">
                <input type="hidden" name="naiyou" value="<?= htmlspecialchars($naiyou) ?>">
                <input type="submit" value="登録">
            </form>
            <br>
            <button onclick="history.back()">戻る</button>
        </fieldset>
    </div>
    <!-- Main[End] -->

</body>

</html>