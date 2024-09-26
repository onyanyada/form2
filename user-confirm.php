<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー登録確認</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }

        td {
            padding: 10px;
        }
    </style>
</head>

<body>

    <header>
        <?php echo $_SESSION["name"]; ?>さん
        <?php include("menu.php"); ?>
    </header>

    <main>
        <h2>入力内容確認</h2>
        <form method="post" action="user-insert.php">
            <table>
                <tr>
                    <td>名前</td>
                    <td>
                        <p><?= htmlspecialchars($_POST['name']) ?></p>
                    </td>
                </tr>
                <tr>
                    <td>Login ID</td>
                    <td>
                        <p><?= htmlspecialchars($_POST['lid']) ?></p>
                    </td>
                </tr>
                <tr>
                    <td>管理FLG</td>
                    <td><?= $_POST['kanri_flg'] == "1" ? "管理者" : "一般" ?></td>
                </tr>
            </table>

            <!-- hidden fields to pass data to user-insert.php -->
            <input type="hidden" name="name" value="<?= htmlspecialchars($_POST['name']) ?>">
            <input type="hidden" name="lid" value="<?= htmlspecialchars($_POST['lid']) ?>">
            <input type="hidden" name="lpw" value="<?= htmlspecialchars($_POST['lpw']) ?>">
            <input type="hidden" name="kanri_flg" value="<?= $_POST['kanri_flg'] ?>">

            <input type="submit" value="登録する">
            <button type="button" onclick="history.back()">戻る</button>
        </form>
    </main>

</body>

</html>