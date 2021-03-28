<?php
  //データベースにアクセス
  $dsn = 'mysql:dbname=cmtool;host=r-and-d-app-db.cluster-cpsha8yhzuxl.ap-northeast-1.rds.amazonaws.com;charset=utf8';
  $user = 'admin';
  $password ='pLcNsjB5dHCI9a8ltaXh';
  $options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
  );
  try {
    $dbh = new PDO($dsn, $user, $password);
    echo "接続成功\n";
  } catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage() . "\n";
    exit();
  }
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>構成管理ツール 機器一覧</title>
  </head>
  <body>
    <div class="text-center">
      <h1>機器一覧</h1>
        <div class="container">
          <table class="table table-striped table-hover">
            <thead class="table-light">
              <tr>
                <th class="col-3" scope="col">機器名</th>
                <th class="col-4" scope="col">型式</th>
                <th class="col-1" scope="col">IPアドレス</th>
                <th class="col-3" scope="col"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>サンプル</td>
                <td>サンプル</td>
                <td>192.168.1.1</td>
                <td>
                  <a class="btn btn-primary mx-1" href="itemDetail.php" role="button">詳細</a>
                  <a class="btn btn-primary mx-1" href="itemAdd.php" role="button">追加</a>
                  <a class="btn btn-primary mx-1" href="itemEdit.php" role="button">編集</a>
                </td>
              </tr>
              <tr>
                <td>Sample</td>
                <td>Sample</td>
                <td>192.168.1.2</td>
                <td>
                  <a class="btn btn-primary mx-1" href="itemDetail.php" role="button">詳細</a>
                  <a class="btn btn-primary mx-1" href="itemAdd.php" role="button">追加</a>
                  <a class="btn btn-primary mx-1" href="itemEdit.php" role="button">編集</a>
                </td>
              </tr>
              <tr>
                <td>サンプル</td>
                <td>サンプル</td>
                <td>192.168.1.3</td>
                <td>
                  <a class="btn btn-primary mx-1" href="itemDetail.php" role="button">詳細</a>
                  <a class="btn btn-primary mx-1" href="itemAdd.php" role="button">追加</a>
                  <a class="btn btn-primary mx-1" href="itemEdit.php" role="button">編集</a>
                </td>
              </tr>
            </tbody>
          </table>
        <a class="btn btn-primary mx-3" href="customerList.php" role="button">保守先一覧</a>
      </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
