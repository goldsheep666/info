<?php
require_once ("../db-connect.php");
if(isset($_GET["id"])){
    $id=$_GET["id"];
}else{
    $id=0;
}
$sql="SELECT * FROM information WHERE id='$id'";
$result = $conn->query($sql);
$count = $result->num_rows;
?>

<!doctype html>
<html lang="en">
<head>
    <title>information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php require_once("../public/css.php") ?>
    <style>
        .form-control-sm{
            width:70%;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row wrap d-flex ">
        <?php require_once("../public/header.php") ?>
        <aside class="col-lg-2 navbar-side shadow-sm">
            <?php require_once("../public/nav.php") ?>
        </aside>
        <div class="col-lg-9 button-group d-flex align-items-center shadow-sm">
            <?php if($count===0): ?>
                使用者不存在
            <?php else:
            $row=$result->fetch_assoc();
            ?>
            <a class="btn btn-primary" href="info-list.php">返回</a>
            <button class="btn btn-primary m-4" type="submit">發布</button>
            <button class="btn btn-primary ">預覽</button>
            <a href="infoDelete.php?id=<?=$row["id"]?>" class="btn btn-danger">刪除</a>
        </div>
        <div class="col-lg-9  article py-3">
            <div class="d-flex align-items-center  justify-content-center">
                <input type="file" class="form-control form-control-sm" id="inputGroupFile">
                <button class="btn btn-primary m-2" type="submit">上傳</button>
            </div>
        </div>
        <div class="col-lg-9 article py-3">
            <label class="form-label">標題</label>
            <input type="text" class="form-control mb-3" value="<?=$row["title"]?>">
            <label for="exampleFormControlTextarea1" class="form-label">內容</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"rows="20">
                <?=$row["content"]?></textarea>
        </div>
        <?php endif;?>

    </div>
</div>


</body>
</html>
