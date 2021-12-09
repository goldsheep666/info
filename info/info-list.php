<?php
require_once("../method/pdo-connect.php");
$sql = "SELECT * FROM information WHERE valid=1 ";
$stmt = $db_host->prepare($sql);

try {
    $stmt->execute();
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
} catch (PDOException $e) {
    echo $e->getMessage();
}

//搜尋
if (isset($_GET["find"])) {
    $find = $_GET["find"];
    $sql = "SELECT * FROM information WHERE content LIKE ? AND valid=1 ORDER BY time DESC";
    $stmt = $db_host->prepare($sql);
    try {
        $stmt->execute(["%$find%"]);
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
} else {
    $find = "";
    //分頁
    if (isset($_GET["p"])) {
        $pageNum = $_GET["p"];//第幾頁
    } else {
        $pageNum = 1;
    }
    $perPageCount = 3;//每頁10筆
    $startRow = ($pageNum - 1) * $perPageCount;
    $page = $count / $perPageCount;//總頁數
    $pRemainder = $count % $perPageCount;
    $perPageStart = ($pageNum - 1) * $perPageCount + 1;
    $perPageEnd = $pageNum * $perPageCount;

    if ($pRemainder !== 0) {
        $page = ceil($page);
        if ($pageNum == $page) {
            $perPageEnd = ($pageNum - 1) * $perPageCount + $pRemainder;
        }
    } else {
        $page = $count / $perPageCount;
    }
    $sql = "SELECT * FROM information WHERE valid=1 ORDER BY time DESC LIMIT $startRow, $perPageCount";
    $stmt = $db_host->prepare($sql);
    try {
        $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}




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
            padding-top: 20px;
        }

        .form-control-sm {
            width: 60%;
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

        <div class=" col-lg-9 button-group shadow-sm d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <a href="info-list.php?p=1" class="btn btn-primary text-nowrap me-4">資料列表</a>
                <a href="info-create.php" class="btn btn-primary text-nowrap me-4">新增</a>
            </div>
            <div class="d-flex align-items-center">
               <form action="info-list.php" method="get" class="d-flex">
<!--                   <input type="search" class="form-control form-control-sm me-2" name="find_category"-->
<!--                   value="--><?php //if (isset($find_category)) echo $find_category; ?><!--" placeholder="類別搜尋">-->
<!--                   <button class="btn btn-primary text-nowrap me-4" type="submit">搜尋</button>-->
                    <input type="search" class="form-control form-control-sm me-2" name="find"
                           value="<?php if (isset($find)) echo $find; ?>" placeholder="內容搜尋">
                    <button class="btn btn-primary text-nowrap" type="submit">搜尋</button>
                </form>
            </div>
        </div>
        <div class="col-lg-9 section">
            <?php if (isset($pageNum)) : ?>
                <div>
                    第 <?= $perPageStart ?> ~ <?= $perPageEnd ?> 筆, 總共 <?= $count ?> 筆資料
                </div>
            <?php else: ?>
                <div>
                    共 <?= $count ?> 筆資料
                </div>

            <?php endif; ?>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>檢視</th>
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
                    foreach ($row as $key => $value):?>

                        <tr>
                            <td><a href="info-read.php?id=<?= $value["id"] ?>">
                                    <i class="fas fa-search"></i></a></td>
                            <td><?= $value["id"] ?></td>
                            <td>
                                <?= $value["category"] ?>
                            </td>
                            <td>
                        <span class="d-inline-block text-truncate" title="<?= $value["title"] ?>"
                              style="max-width: 85px;">
                            <?= $value["title"] ?>
                        </span>
                            </td>
                            <td>
                        <span class="d-inline-block text-truncate" title="<?= $value["content"] ?>"
                              style="max-width: 480px;">
                            <?= $value["content"] ?>
                          </span>
                            </td>
                            <td><?= $value["time"] ?></td>

                            <td>

                                <a href="info-editor.php?id=<?= $value["id"] ?>">
                                   <i class="fas fa-edit"></i></a>
                                <a href="infoDelete.php?id=<?= $value["id"] ?>" onclick="javascript:return del();">
                                   <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                else:?>
                    <tr>
                        <td colspan="7">沒有資料</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
            <?php if (isset($pageNum)):?>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="info-list.php?p=1">第一頁</a></li>
                        <?php for ($i = 1; $i <= $page; $i++): ?>
                            <li class="page-item <?php if ($pageNum == $i) echo "active" ?>">
                                <a class="page-link" href="info-list.php?p=<?= $i ?>"><?= $i ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item"><a class="page-link" href="info-list.php?p=<?= $page ?>">最末頁</a></li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div><!--col-9-->
    </div>
</div><!--container-->
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
