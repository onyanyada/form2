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



<?php include("head.php"); ?>
<title>ユーザーデータ更新</title>
</head>

<body>

    <!-- header -->
    <?php include("menu.php"); ?>
    <h2>ユーザーデータ更新</h2>

    <form method="POST" action="user-update.php">

        <legend>[編集]</legend>
        <label>名前：<input type="text" name="name" value="<?= h($row["name"]) ?>"></label><br>
        <label>Login ID：<input type="text" name="lid" value="<?= h($row["lid"]) ?>"></label><br>
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

    </form>
    <!-- Main[End] -->


</body>

</html>