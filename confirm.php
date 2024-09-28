<?php
session_start();

include("funcs.php");
// POSTで送られてきたデータを受け取る
$_SESSION["name"]  = $_POST["name"];
$_SESSION["email"] = $_POST["email"];
$_SESSION["spending"]  = $_POST["spending"];
$_SESSION["income"]  = $_POST["income"];
$_SESSION["age"]  = $_POST["age"];
$_SESSION["gender"]  = $_POST["gender"];
$_SESSION["hour"]  = $_POST["hour"];
$_SESSION["timeZone"] = isset($_POST['timeZone']) ? $_POST['timeZone'] : [];
$_SESSION["timeZoneStr"] = implode(".", $_SESSION["timeZone"]);
$_SESSION["region"]  = $_POST["region"];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>確認画面</title>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/confirm.css">
</head>

<body>
    <header>
        <h1>確認画面</h1>
    </header>
    <main>
        <div class="form-wrapper">
            <div class="confritm-msg">
                <p>以下の内容で送信しますか？</p>
            </div>
            <form action="insert.php" method="post">
                <table>
                    <tr>
                        <td>名前</td>
                        <td><?= h($_SESSION["name"]) ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= h($_SESSION["email"]) ?></td>
                    </tr>
                    <tr>
                        <td>漫画年間支出額</td>
                        <td><?= h($_SESSION["spending"]) ?></td>
                    </tr>
                    <tr>
                        <td>収入</td>
                        <td><?= h($_SESSION["income"]) ?></td>
                    </tr>
                    <tr>
                        <td>年齢</td>
                        <td><?= h($_SESSION["age"]) ?></td>
                    </tr>
                    <tr>
                        <td>性別</td>
                        <td><?= h($_SESSION["gender"]) ?></td>
                    </tr>
                    <tr>
                        <td>時間/週</td>
                        <td><?= h($_SESSION["hour"]) ?></td>
                    </tr>
                    <tr>
                        <td>時間帯</td>
                        <td><?= h($_SESSION["timeZoneStr"]) ?></td>
                    </tr>
                    <tr>
                        <td>地域</td>
                        <td><?= h($_SESSION["region"]) ?></td>
                    </tr>
                </table>
                <button type="submit">送信する</button>
            </form>
        </div>
    </main>
</body>

</html>