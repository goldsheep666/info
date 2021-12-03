<?php
?>
<!doctype html>
<html lang="en">
<head>
    <title>聯絡我們</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>
<body>
<div class="container">
    <form action="" method="post">
        <div class="py-2">
            <label for="">名稱</label>
            <input type="text" name="from_name" id="from_name" class="form-control"readonly>
        </div>
        <div class="py-2">
            <label for="">聯絡信箱</label>
            <input type="email" name="from_mail" id="from_mail" class="form-control"readonly>
        </div>
        <div class="py-2">
            <label for="">主旨</label>
            <input type="text" name="mail_subject" id="mail_subject" class="form-control"readonly>
        </div>
        <div class="py-2">
            <label for="">傳送時間</label>
            <input type="text" name="mail_time" id="mail_time" class="form-control"readonly>
        </div>
        <div class="py-2">
            <label for="">內容</label>
            <textarea class="form-control" name="mail_content" id="mail_content" cols="30" rows="10"readonly></textarea>
        </div>
        <div class="py-2">
            <label for="">回覆</label>
            <textarea class="form-control" name="mail_content" id="mail_content" cols="30" rows="10"></textarea>
        </div>

        <button class="btn btn-primary" type="submit">送出</button>
        <input type="text" name="sendmail" id="sendmail" value="true">
    </form>




</div>
</body>
</html>
