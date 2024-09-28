<?php
session_start(); // セッションを開始
include("funcs.php");
// セッションからデータを取得
// 必須入力項目は直接取得
$name        = $_SESSION["name"];
$email       = $_SESSION["email"];
$spending    = $_SESSION["spending"];
$income      = $_SESSION["income"];
$age         = $_SESSION["age"];
$gender      = $_SESSION["gender"];
$hour        = $_SESSION["hour"];
// timeZoneStrは任意項目なので、isset()でチェック
$timeZoneStr = isset($_SESSION["timeZoneStr"]) ? $_SESSION["timeZoneStr"] : '不明な時間帯';
$region      = $_SESSION["region"];

// セッションデータをクリア（完了後は不要なセッションデータを消す）
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登録完了</title>
    <link rel="stylesheet" href="css/complete.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <h1>送信完了</h1>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <main>

        <p class="complete">アンケートを送信しました</p>
        <div class="form-wrapper">
            <table>
                <tr>
                    <td>名前</td>
                    <td><?= h($name) ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= h($email) ?></td>
                </tr>
                <tr>
                    <td>漫画年間支出額</td>
                    <td><?= h($spending) ?></td>
                </tr>
                <tr>
                    <td>収入</td>
                    <td><?= h($income) ?></td>
                </tr>
                <tr>
                    <td>年齢</td>
                    <td><?= h($age) ?></td>
                </tr>
                <tr>
                    <td>性別</td>
                    <td><?= h($gender) ?></td>
                </tr>
                <tr>
                    <td>時間/週</td>
                    <td><?= h($hour) ?></td>
                </tr>
                <tr>
                    <td>時間帯</td>
                    <td><?= h($timeZoneStr) ?></td>
                </tr>
                <tr>
                    <td>地域</td>
                    <td><?= h($region) ?></td>
                </tr>
            </table>

        </div>
        <a class="back" href="index.php">戻る</a>

    </main>


</body>

</html>