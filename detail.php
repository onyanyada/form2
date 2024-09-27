<?php
session_start();
// $_GET["id"]がセットされているか確認
if (!isset($_GET["id"]) || empty($_GET["id"])) {
  echo "IDが指定されていません。"; ?>

  <a href="select.php">データ一覧に戻る</a>
<?php
  exit(); // 処理を終了させます
}
$id = $_GET["id"]; //?id~**を受け取る
include("funcs.php");
sschk();
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM form2_table WHERE id=:id");
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
<title>アンケート編集</title>
</head>

<body>


  <!-- header -->
  <?php include("menu.php"); ?>
  <h2>アンケート編集</h2>

  <form method="POST" action="update.php">
    <div class="jumbotron">
      <fieldset>
        <legend>[編集]</legend>
        <label>名前：<input type="text" name="name" value="<?= h($row["name"]) ?>"></label><br>
        <label>Email：<input type="text" name="email" value="<?= h($row["email"]) ?>"></label><br>
        <label>支出：<input type="text" name="spending" value="<?= h($row["spending"]) ?>"></label><br>
        <label>年収：<input type="text" name="income" value="<?= h($row["income"]) ?>"></label><br>
        <label>年齢：<input type="text" name="age" value="<?= h($row["age"]) ?>"></label><br>
        <label>性別：<input type="text" name="gender" value="<?= h($row["gender"]) ?>"></label><br>
        <label>時間：<input type="text" name="hour" value="<?= h($row["hour"]) ?>"></label><br>
        <label>地域：<input type="text" name="region" value="<?= h($row["region"]) ?>"></label><br>
        <input type="submit" value="送信">
        <input type="hidden" name="id" value="<?= $id ?>">
      </fieldset>
    </div>
  </form>
  <!-- Main[End] -->


</body>

</html>