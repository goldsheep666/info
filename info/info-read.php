<?php
require_once ("../method/pdo-connect.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    $id = 0;
}
$sql="SELECT * FROM information WHERE valid=1 AND id=?";
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
                    <button class="btn btn-danger m-4" onclick="javascript:return del();">刪除</button>
                </div>
            <div class="col-lg-9 article p-3">

                <table class="table table-bordered">
                    <?php if ($infoCount > 0):
                    foreach ($row as $key => $value): ?>
                    <tr>
                        <th>id</th>
                        <td><?=$value["id"]?></td>
                    </tr>
                    <tr>
                        <th>類別</th>
                        <td><?=$value["category"]?></td>
                    </tr>
                    <tr>
                        <th>建立時間</th>
                        <td><?=$value["time"]?></td>
                    </tr>
                    <tr>
                        <th>標題</th>
                        <td><?=$value["title"]?></td>
                    </tr>
                    <tr>
                        <th>內容</th>
<!--                        word-wrap:break-word-->
                        <td><pre style="max-width: 960px"><?=$value["content"]?></pre></td>
                    </tr>
                    <tr>
                        <th>圖片</th>
                        <td><?=$value["img"]?></td>
                    </tr>
                    <tr>
                        <th>影片</th>
                        <td><?=$value["film"]?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td>沒有資料</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>






        </form>
    </div>
</div>
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
</script>


</body>
</html>