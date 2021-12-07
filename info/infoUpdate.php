<?php
$id=$_POST["id"];
$category=$_POST["category"];
$title=$_POST["title"];
$content=$_POST["content"];
$now=date("Y-m-d H:i:s");

require_once ("../method/pdo-connect.php");
$sql="UPDATE information SET category=? ,title=?, content=?, time=? WHERE id=?";

$stmt = $db_host->prepare($sql);
try {
    $stmt->execute([$category,$title,$content,$now,$id]);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("location:info-list.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "<br/>";
    exit;
}
?>