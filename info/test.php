<?php
require_once ("../db-connect.php");
$sql="SELECT * FROM information WHERE valid=1";
$result = $conn->query($sql);
$count = $result->num_rows;


if(isset($_GET["p"])){
    $pageNum=$_GET["p"];//第幾頁
}else {
    $pageNum = 1;
}

$perPageCount=2;//每頁10筆
$startRow=($pageNum-1) * $perPageCount;
$page=$count / $perPageCount;//總頁數
$pRemainder=$count % $perPageCount;
$perPageStart=($pageNum-1) * $perPageCount + 1;
$perPageEnd=$pageNum * $perPageCount ;

if($pRemainder!==0){
    $page=ceil($page);
    if ($pageNum == $page) {
        $perPageEnd = ($pageNum-1) * $perPageCount + $pRemainder;
    }
}else{
    $page=$count / $perPageCount;
}


$sql = "SELECT * FROM information WHERE valid=1 ORDER BY id LIMIT $startRow, $perPageCount";

if (isset($_GET["find"])){
    $find=$_GET["find"];
    $sql="SELECT * FROM information WHERE content LIKE '%$find%' LIMIT $startRow, $perPageCount";
}else{
    $sql="SELECT * FROM information WHERE valid=1 ORDER BY id LIMIT $startRow, $perPageCount";
}

$result = $conn->query($sql);
$findCount = $result->num_rows;
//$row = $result->fetch_assoc();

?>

<!doctype html>
<html lang="en">
<head>
    <title>information list</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php require_once("../public/css.php") ?>
    <style>
        .section {
            margin: 20px 0px 0px 300px;
            background: #fff;
            padding-top:20px ;
        }
        .form-control-sm{
            width:60%;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <div class="row wrap d-flex">
        <?php require_once("../public/header.php") ?>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 navbar-side shadow-sm">
            <?php require_once("../public/nav.php") ?>
        </aside>

        <div class=" col-lg-9 button-group shadow-sm d-flex align-items-center">
            <a href="test.php" class="btn btn-primary text-nowrap me-4">返回列表</a>
            <a href="info-create.php" class="btn btn-primary text-nowrap">新增</a>
            <a class="btn btn-danger m-4 text-nowrap">刪除</a>
            <form action="test.php" method="get" class="d-flex">
            <input type="search" class="form-control form-control-sm me-4" name="find"
                   value="<?php if(isset($search))echo $search; ?>" placeholder="內容搜尋">
            <button class="btn btn-primary text-nowrap"type="submit" >搜尋</button>
            </form>
        </div>
        <div class="col-lg-9 section">
            <?php if (isset($pageNum)): ?>
                <div>
                   第 <?=$perPageStart?> ~ <?=$perPageEnd?> 筆, 總共 <?= $count ?> 筆資料
                </div>
            <?php else: ?>
            <div>
                共 <?= $count ?> 筆資料
            </div>
            <?php endif; ?>
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>選取</th>
                    <th>id</th>
                    <th>類別</th>
                    <th>標題</th>
                    <th>內容</th>
                    <th>發送時間</th>
                    <th>編輯</th>
                </tr>
                </thead>
                <tbody>
                <?php if ($count > 0):
                    while ($row=$result->fetch_assoc()):
                        ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td><?=$row["id"]?></td>
                            <td>
                                <?=$row["category"]?>
                            </td>
                            <td>
                        <span class="d-inline-block text-truncate" style="max-width: 85px;">
                            <?=$row["title"]?>
                        </span>
                            </td>
                            <td>
                        <span class="d-inline-block text-truncate" style="max-width: 430px;">
                            <?=$row["content"]?>
                          </span>
                            </td>
                            <td><?=$row["time"]?></td>
                            <td>
                                <a href="info-read.php?id=<?= $row["id"] ?>" class="btn btn-primary text-nowrap">檢視</a>
                                <a href="info-editor.php?id=<?= $row["id"] ?>" class="btn btn-primary" style="margin-bottom: 1px;">修改</a>
                                <a href="infoDelete.php" class="btn btn-danger" role="button">刪除</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">沒有資料</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php if(isset($pageNum)): ?>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="test.php?p=1">第一頁</a></li>
                    <?php for($i=1;$i<=$page;$i++):?>
                        <li class="page-item <?php if($pageNum==$i)echo "active" ?>"><a class="page-link" href="test.php?p=<?=$i?>"><?=$i?></a></li>
                    <?php endfor;?>
                    <li class="page-item"><a class="page-link" href="test.php?p=<?=$page?>">最末頁</a></li>
                </ul>
            </nav>
            <?php endif; ?>
        </div><!--col-9-->
    </div>
</div><!--container-->


</body>
</html>
