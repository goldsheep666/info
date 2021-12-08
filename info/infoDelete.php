<?php
$id=$_GET["id"];
require_once ("../method/pdo-connect.php");
$sql="UPDATE information SET valid = 0 WHERE id=?";
$stmt = $db_host->prepare($sql);
try {
    $stmt->execute([$id]);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header("location:info-list.php");
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() ;
    exit;
}
?>