<?php
session_start();
// $_GET["id"]がセットされているか確認
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    echo "IDが指定されていません。";
?>
    <a href="select.php">データ一覧に戻る</a>
<?php
    exit(); // 処理を終了させます
}
$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ更新</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="user-select.php">ユーザーデータ一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->


    <!-- Main[Start] -->

    <form method="POST" action="user-update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>名前：<input type="text" name="name" value="<?= htmlspecialchars($row["name"]) ?>"></label><br>
                <label>Login ID：<input type="text" name="lid" value="<?= htmlspecialchars($row["lid"]) ?>"></label><br>
                <label>新しいパスワード：<input type="password" name="lpw"></label><br>
                <label>管理FLG：</label>
                <label>
                    <input type="radio" name="kanri_flg" value="0" <?= $row["kanri_flg"] == "0" ? "checked" : "" ?>> 一般
                </label>
                <label>
                    <input type="radio" name="kanri_flg" value="1" <?= $row["kanri_flg"] == "1" ? "checked" : "" ?>> 管理者
                </label><br>
                <label>退会FLG：</label>
                <label>
                    <input type="radio" name="life_flg" value="0" <?= $row["life_flg"] == "0" ? "checked" : "" ?>> 有効
                </label>
                <label>
                    <input type="radio" name="life_flg" value="1" <?= $row["life_flg"] == "1" ? "checked" : "" ?>> 退会
                </label><br>
                <input type="submit" value="送信">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>