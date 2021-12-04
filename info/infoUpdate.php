<?php
$id=$_POST["id"];
$category=$_POST["category"];
$title=$_POST["title"];
$content=$_POST["content"];

require_once ("../method/db-connect.php");
$sql="UPDATE information SET category='$category' ,title='$title', content='$content'WHERE id='$id'";
$result=$conn->query($sql);

if ($conn->query($sql) === TRUE) {
//    echo "修改資料完成<br>";
    header("location: info-list.php");
} else {
    echo "修改資料錯誤: " . $conn->error;
}
$conn->close();
?>