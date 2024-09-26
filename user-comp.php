<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>USERデータ登録</title>
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
        <?php echo $_SESSION["name"]; ?>さん
        <?php include("menu.php"); ?>
    </header>
    <main>
        <h2>ユーザー登録が完了しました</h2>
        <table>
            <tr>
                <td>名前:</td>
                <td><?= htmlspecialchars($_SESSION['registered-name']) ?></td>
            </tr>
            <tr>
                <td>Login ID:</td>
                <td><?= htmlspecialchars($_SESSION['lid']) ?></td>
            </tr>
            <tr>
                <td>管理FLG:</td>
                <td><?= $_SESSION['registered-kanri_flg'] == '1' ? '管理者' : '一般' ?></td>
            </tr>
        </table>
        <a href="user.php">ユーザー登録画面に戻る</a>
    </main>

</body>

</html>