<?php
$server="localhost";
$username="funwave";
$password="20211013";
$dbname="funwave";
//$conn=new mysqli($server, $username, $password, $dbname);

try {
    $conn= new PDO(
        "mysql:host={$server};dbname=$dbname;charset=utf8",$username ,$password
    );//host=可以不打
//    echo "資料庫連線成功";

}catch(PDOException $e){
    echo "資料庫連線失敗";
    echo "error: ".$e->getMessage();
}
//catch抓錯誤訊息



//new PDO(
//       " 要使用的資料庫(mysql):位置 , table名 , 使用者名稱 , 密碼"
//    );
?>


