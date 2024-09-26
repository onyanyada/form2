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


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <?php echo $_SESSION["name"]; ?>さん　
        <?php include("menu.php"); ?>
    </header>
    <!-- Head[End] -->


    <!-- Main[Start] -->
    <div>
        <?php if ($_SESSION["kanri_flg"] == "1") { ?>
            <div class="container jumbotron">

                <table>
                    <?php foreach ($values as $v) { ?>
                        <tr>
                            <td><?= $v["id"] ?></td>
                            <td><?= $v["name"] ?></td>
                            <td><?= $v["lid"] ?></td>
                            <td><?= $v["lpw"] ?></td>
                            <td><?= $v["kanri_flg"] ?></td>
                            <td><?= $v["life_flg"] ?></td>
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