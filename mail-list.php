<?php
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
        </div>
        <div class="col-lg-9 section">
            <table class="table table-bordered ">
                <thead>
                <tr>
                    <th>選取</th>
                    <th>id</th>
                    <th>類別</th>
                    <th>內容</th>
                    <th>發送時間</th>
                    <th>編輯</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 85px;">
                            教練
                        </span>
                    </td>
                    <td>
                        <span class="d-inline-block text-truncate" style="max-width: 500px;">
                            教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹 教練介紹教練介紹
                          </span>
                    </td>
                    <td>2021-12-01 08:00:00</td>
                    <td>
                        <button class="btn btn-primary" style="margin-bottom: 1px;">回覆</button>
                        <button class="btn btn-primary ">查看</button>
                    </td>
                </tr>
                </tbody>
            </table>


        </div><!--col-9-->

    </div>

</div><!--container-->


</body>
</html>
