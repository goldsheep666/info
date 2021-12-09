<?php
require_once("../method/pdo-connect.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = 0;
}
$sql = "SELECT * FROM information WHERE valid=1 AND id=?";
$stmt = $db_host->prepare($sql);
try {
    $stmt->execute([$id]);
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $infoCount=$stmt->rowCount();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() ;
}
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
        .form-control-sm {
            width: 70%;
        }
        .badge:hover{

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
        <?php if ($infoCount === 0): ?>
            使用者不存在
        <?php else:
        foreach ($row as $key => $value):
            ?>
            <form action="infoUpdate.php" method="post">
                <div class="col-lg-9 button-group d-flex align-items-center shadow-sm px-3">

                    <a class="btn btn-primary me-4" href="info-list.php">返回</a>
                    <button class="btn btn-primary me-4" type="submit">儲存</button>
                    <a class="btn btn-primary me-4" href="info-read.php?id=<?= $value["id"] ?>">檢視</a>
                    <a href="infoDelete.php?id=<?= $value["id"] ?>" class="btn btn-danger" onclick="javascript:return del();">刪除</a>
                </div>
                <div class="col-lg-9  article py-3">
                    <div class="d-flex align-items-center  justify-content-center">
                        <input type="file" class="form-control form-control-sm" name="photo">
                    </div>
                </div>
                <div class="col-lg-9 article p-3">
                    <input type="hidden" name="id" value="<?= $value["id"] ?>">
                    <label>類型
                        <input type="text" style="margin-top: 0.5rem" class="form-control mb-3"name="category" value="<?=$value["category"]?>">
                    </label>
                    <br>
                    <label class="form-label">標題</label>
                    <input type="text" class="form-control mb-3"name="title" value="<?= $value["title"] ?>">

                    <div class="d-flex justify-content-between">
                    <label class="form-label">內容</label>
                    <div class="d-flex align-items-center">
                        <a role="button" class="badge bg-warning jq-large text-dark me-2"style="text-decoration:none">大</a>
                        <a role="button" class="badge bg-warning jq-medium text-dark me-2" style="text-decoration:none">中</a>
                        <a role="button" class="badge bg-warning jq-small text-dark me-2" style="text-decoration:none">小</a>
                    </div>
                </div>
                    <textarea class="form-control" name="content" rows="20"><?=$value["content"] ?></textarea>
                </div>
            </form>
        <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    function del() {
        var msg = "確定要刪除嗎？\n\n請確認！";
        if (confirm(msg) == true) {
            window.location.replace("infoDelete.php?id=<?= $value["id"] ?>");
            return true;
        } else {
            return false;
        }
    }

    //文字大小更改
    $(".jq-large").on("click", function (e) {
        event.preventDefault(); //取消預設行為
        $("textarea").css("font-size", "24px");

    });

    $(".jq-medium").on("click", function (e) {
        event.preventDefault(); //取消預設行為
        $("textarea").css("font-size", "18px");

    });

    $(".jq-small").on("click", function (e) {
        event.preventDefault(); //取消預設行為
        $("textarea").css("font-size", "12px");

    });
</script>

</body>
</html>
