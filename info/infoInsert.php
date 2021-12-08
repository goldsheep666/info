<?php
$category=$_POST["category"];
$title=$_POST["title"];
$content=$_POST["content"];
$file=$_POST["file"];
$now=date("Y-m-d H:i:s");//時間無法顯示
require_once ("../method/pdo-connect.php");

$sql="INSERT INTO information(category,title ,content, time, img) VALUE(?,?,?,?,?)";

$stmt = $db_host->prepare($sql);
try {
    $stmt->execute([$category,$title,$content,$now,$file]);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("location:info-list.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
    exit;
}




?>