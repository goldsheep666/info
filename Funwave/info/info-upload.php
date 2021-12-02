<?php
//require_once ("fun-connect.php");
//?>

<!doctype html>
<html lang="en">
<head>
    <title>information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .border{
            border: 1px solid black;
        }
    </style>

</head>
<body>
<header>funwave</header>
<div class="container">
    <div class="row">
        <div class="col-3">
            <aside class="border">
                側邊欄
                <br>
                首頁
            </aside>
        </div><!--側邊-->

        <div class="col-9">

            <div class="input-group mb-3">
                <input type="file" class="form-control" id="inputGroupFile">
                <button class="btn btn-primary" type="submit">上傳</button>
            </div>

            <div class="mb-3">
                <label for="">標題</label>
                <input type="text" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">內容</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="20"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">發布</button>
            <button class="btn btn-primary">預覽</button>
            <button class="btn btn-danger">刪除</button>

        </div><!--主要-->

    </div><!--row-->

</div>

</body>
</html>
