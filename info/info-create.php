<!doctype html>
<html lang="en">
<head>
    <title>information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <?php require_once("../public/css.php") ?>
    <style>
        .form-control-sm {
            width: 70%;
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

        <form action="infoInsert.php" method="post">
            <div class="col-lg-9 button-group d-flex align-items-center shadow-sm px-3">

                <a class="btn btn-primary" href="info-list.php">返回</a>
                <button class="btn btn-primary m-4" type="submit">儲存</button>
                <button class="btn btn-primary ">預覽</button>
                <button class="btn btn-danger m-4">刪除</button>
            </div>
            <div class="col-lg-9  article py-3">
                <div class="d-flex align-items-center  justify-content-center">
                    <input type="file" class="form-control form-control-sm" id="inputGroupFile" name="file">
                    <button class="btn btn-primary m-2" type="submit">上傳</button>
                </div>
            </div>
            <div class="col-lg-9 article p-3">
                <label>類型
                    <input type="text" style="margin-top: 0.5rem" class="form-control mb-3" name="category">
                </label>
                <br>
                <label class="form-label">標題</label>
                <input type="text" class="form-control mb-3" name="title" name="title">
                <label for="exampleFormControlTextarea1" class="form-label">內容</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="20"></textarea>

            </div>

        </form>


    </div>
</div>


</body>
</html>
