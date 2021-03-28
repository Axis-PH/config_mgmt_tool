<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // フォームから送信されたデータを各変数に格納
        $editItemName = $_POST["editItemName"];
        $editCategory = $_POST["editCategory"];
        $editModel = $_POST["editModel"];
        $editSerial = $_POST["editSerial"];
        $editIp = $_POST["editIp"];
        $editNetmask = $_POST["editNetmask"];
        $editGateway  = $_POST["editGateway"];
        $editCustomer  = $_POST["editCustomer"];
        $editSite  = $_POST["editSite"];
        $editPlace  = $_POST["editPlace"];
        $editMaker  = $_POST["editMaker"];
        $editMemo  = $_POST["editMemo"];
    }
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>構成管理ツール 機器編集</title>
  </head>
  <body>
    <div>
      <h1 class="text-center">機器編集</h1>
        <div class="container w-50 text-center">
          <p>以下の内容でよろしいですか？</p>
          <form action="itemAdd.php">
            <input type="hidden" name="editItemName" value="<?php echo $editItemName; ?>">
            <input type="hidden" name="editCategory" value="<?php echo $editCategory; ?>">
            <input type="hidden" name="editModel" value="<?php echo $editModel; ?>">
            <input type="hidden" name="editSerial" value="<?php echo $editSerial; ?>">
            <input type="hidden" name="editIp" value="<?php echo $editIp; ?>">
            <input type="hidden" name="editNetmask" value="<?php echo $editNetmask; ?>">
            <input type="hidden" name="editGateway" value="<?php echo $editGateway; ?>">
            <input type="hidden" name="editCustomer" value="<?php echo $editCustomer; ?>">
            <input type="hidden" name="editSite" value="<?php echo $editSite; ?>">
            <input type="hidden" name="editPlace" value="<?php echo $editPlace; ?>">
            <input type="hidden" name="editMaker" value="<?php echo $editMaker; ?>">
            <input type="hidden" name="editMemo" value="<?php echo $editMemo; ?>">
            <table class="table table-striped table-hover">
              <tbody>
                <tr>
                  <th class="col-1" scope="row">機器名</th>
                  <td class="col-3"><?php echo $editItemName; ?></td>
                </tr>
                <tr>
                  <th scope="row"> 機器分類</th>
                  <td><?php echo $editCategory; ?></td>
                </tr>
                <tr>
                  <th scope="row">型式</th>
                  <td><?php echo $editModel; ?></td>
                </tr>
                <tr>
                  <th scope="row">S/N</th>
                  <td><?php echo $editSerial; ?></td>
                </tr>
                <tr>
                  <th scope="row">IPアドレス</th>
                  <td><?php echo $editIp; ?></td>
                </tr>
                <tr>
                  <th scope="row">ネットマスク</th>
                  <td><?php echo $editNetmask; ?></td>
                </tr>
                <tr>
                  <th scope="row">ゲートウェイ</th>
                  <td><?php echo $editGateway; ?></td>
                </tr>
                <tr>
                  <th scope="row">顧客</th>
                  <td><?php echo $editCustomer; ?></td>
                </tr>
                <tr>
                  <th scope="row">拠点</th>
                  <td><?php echo $editSite; ?></td>
                </tr>
                <tr>
                  <th scope="row">設置場所</th>
                  <td><?php echo $editPlace; ?></td>
                </tr>
                <tr>
                  <th scope="row">メーカー</th>
                  <td><?php echo $editMaker; ?></td>
                </tr>
                <tr>
                  <th scope="row">備考</th>
                  <td><?php echo $editMemo; ?></td>
                </tr>
              </tbody>
            </table>
            <button type="button" class="btn btn-secondary" onclick="history.back()">キャンセル</button>
            <button type="submit" class="btn btn-primary">保存</button>
          </form>
        </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
