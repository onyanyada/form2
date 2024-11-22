<?php
//0. SESSION開始！！
session_start();

//１．関数群の読み込み
include("funcs.php");

//LOGINチェック → funcs.phpへ関数化しましょう！
sschk();

//２．データ登録SQL作成
$pdo = db_conn();
$sql = "SELECT * FROM gs_user_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if ($status == false) {
    sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetchAll(PDO::FETCH_ASSOC); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values, JSON_UNESCAPED_UNICODE);

?>


<?php include("head.php"); ?>
<title>USERデータ登録</title>
</head>

<body>

    <!-- header -->
    <?php include("menu.php"); ?>


    <!-- Main[Start] -->
    <div>
        <?php if ($_SESSION["kanri_flg"] == "1") { ?>
            <div class="container jumbotron">

                <table>
                    <?php foreach ($values as $v) { ?>
                        <tr>
                            <td><?= h($v["id"]) ?></td>
                            <td><?= h($v["name"]) ?></td>
                            <td><?= h($v["lid"]) ?></td>
                            <td><?= h($v["lpw"]) ?></td>
                            <td><?= h($v["kanri_flg"]) ?></td>
                            <td><?= h($v["life_flg"]) ?></td>
                            <td><a href="user-detail.php?id=<?= $v["id"] ?>">[更新]</a></td>
                            <td><a href="user-delete.php?id=<?= $v["id"] ?>">[削除]</a></td>

                        </tr>
                    <?php } ?>
                </table>

            </div>
        <?php } ?>
        <?php if ($_SESSION["kanri_flg"] == "0") { ?>
            <p>管理者権限を持っていません</p>
        <?php } ?>
    </div>
    <!-- Main[End] -->


    <script>
        const a = '<?php echo $json; ?>';
        console.log(JSON.parse(a));
    </script>
</body>

</html>