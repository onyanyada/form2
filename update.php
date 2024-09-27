<?php
session_start();
//1. POSTデータ取得
$name  = $_POST["name"];
$email = $_POST["email"];
$spending  = $_POST["spending"];
$income  = $_POST["income"];
$age  = $_POST["age"];
$gender  = $_POST["gender"];
$hour  = $_POST["hour"];
// $timeZone = isset($_POST['timeZone']) ? $_POST['timeZone'] : [];
// $timeZoneStr = $_POST["timeZoneStr"];
$region  = $_POST["region"];
$id = $_POST["id"];

//2. DB接続します
include("funcs.php");
sschk();
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE form2_table SET 
name=:name,
email=:email,
spending=:spending,
income=:income,
age=:age,
gender=:gender,
hour=:hour,
region=:region
WHERE id=:id");

$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':spending', $spending, PDO::PARAM_INT);
$stmt->bindValue(':income', $income, PDO::PARAM_INT);
$stmt->bindValue(':age', $age, PDO::PARAM_INT);
$stmt->bindValue(':gender', $gender, PDO::PARAM_STR);
$stmt->bindValue(':hour', $hour, PDO::PARAM_INT);
$stmt->bindValue(':region', $region, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status == false) {
  sql_error($stmt);
} else {
  redirect("select.php");
}
