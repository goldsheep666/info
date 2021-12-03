<?php
require_once ("../db-connect.php");
$sql="SELECT * FROM information WHERE valid=1";
$result = $conn->query($sql);
//$row = $result->fetch_assoc();
$count = $result->num_rows;

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
            <a href="info-create.php" class="btn btn-primary" role="button">新增</a>
            <button class="btn btn-danger m-4">刪除</button>
            <input type="number" class="form-control form-control-sm">
            <button class="btn btn-primary m-4">搜尋</button>
        </div>
        <div class="col-lg-9 section">
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
                        <span class="d-inline-block text-truncate" style="max-width: 550px;">
                            <?=$row["content"]?>
                          </span>
                    </td>
                    <td><?=$row["time"]?></td>
                    <td>
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
        </div><!--col-9-->
    </div>
</div><!--container-->


</body>
</html>
