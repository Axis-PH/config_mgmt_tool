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
        <div class="container w-50">
          <a class="btn btn-primary" href="itemDelete.php">削除</a>
          <form action="itemEditConfirm.php" method="post">
            <div class="mb-3">
              <label for="editItemName" class="form-label">機器名</label>
              <input type="text" class="form-control" name="editItemName" id="editItemName">
            </div>
            <div class="mb-3">
              <label for="editCategory" class="form-label">機器分類</label>
              <input type="text" class="form-select" name="editCategory" id="editCategory">
            </div>
            <div class="mb-3">
              <label for="editModel" class="form-label">型式</label>
              <input type="text" class="form-control" name="editModel" id="editModel">
            </div>
            <div class="mb-3">
              <label for="editSerial" class="form-label">S/N</label>
              <input type="text" class="form-control" name="editSerial" id="editSerial">
            </div>
            <div class="mb-3">
              <label for="editIp" class="form-label">IPアドレス</label>
              <input type="text" class="form-control" name="editIp" id="editIp">
            </div>
            <div class="mb-3">
              <label for="editNetmask" class="form-label">ネットマスク</label>
              <input type="text" class="form-control" name="editNetmask" id="editNetmask">
            </div>
            <div class="mb-3">
              <label for="editGateway" class="form-label">ゲートウェイ</label>
              <input type="text" class="form-control" name="editGateway" id="editGateway">
            </div>
            <div class="mb-3">
              <label for="editCustomer" class="form-label">顧客</label>
              <input type="text" class="form-control" name="editCustomer" id="editCustomer">
            </div>
            <div class="mb-3">
              <label for="editSite" class="form-label">拠点</label>
              <input type="text" class="form-control" name="editSite" id="editSite">
            </div>
            <div class="mb-3">
              <label for="editPlace" class="form-label">設置場所</label>
              <input type="text" class="form-control" name="editPlace" id="editPlace">
            </div>
            <div class="mb-3">
              <label for="editMaker" class="form-label">メーカー</label>
              <input type="text" class="form-control" name="editMaker" id="editMaker">
            </div>
            <div class="mb-3">
              <label for="editMemo" class="form-label">備考</label>
              <input type="text" class="form-control" name="editMemo" id="editMemo">
            </div>
            <div class="text-center mb-3">
              <button type="Submit" class="btn btn-primary">確認</button>
            </div>
            <div class="text-center mb-3">
              <a href="itemDetail.php" class="text-center">戻る</a>
            </div>
          </form>
        </div>
    </div>
  </body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</html>
