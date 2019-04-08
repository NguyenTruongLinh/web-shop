<?php

  require_once __DIR__. "/../../autoload/autoload.php";

  $id = intval(getInput('id'));

  $EditTransaction = $db->fetchID("transaction", $id);
  if (empty($EditTransaction)) {
    $_SESSION['error'] = "Dữ liệu không tồn tại!";
    redirectAdmin("transaction");
  }

  // $status = $EditTransaction['status'] == 0 ? 1 : 0;

  // $update = $db->update("transaction", array("status" => $status), array("id" => $id));
  // if ($update > 0) {
  //   $_SESSION['success'] = "Cập nhật thành công!";

  //   $sql = "SELECT product_id, qty FROM oders WHERE transaction_id = $id";
  //   $orders = $db->fetchsql($sql);
  //   foreach ($orders as $item) {
  //     $id_product = intval($item['product_id']);

  //     $product = $db->fetchID("product", $id_product);

  //     $number = $product['number'] - $item['qty'];

  //     $up_product = $db->update("product", array("number"=>$number), array("id"=>$id_product));
  //   }

  //   redirectAdmin("transaction");
  // }
  // else{
  //   $_SESSION['error'] = "Dữ liệu không thay đổi!";
  //   redirectAdmin("transaction");
  // }

  // Nếu status == 0
  if ($EditTransaction['status'] == 0) {
    // Chuyển về 1
    $status = 1;

    $update = $db->update("transaction", array("status" => $status), array("id" => $id));

    if ($update > 0) {
      $_SESSION['success'] = "Cập nhật thành công!";

      $sql = "SELECT product_id, qty FROM oders WHERE transaction_id = $id";
      $orders = $db->fetchsql($sql);
      foreach ($orders as $item) {
        $id_product = intval($item['product_id']);

        $product = $db->fetchID("product", $id_product);

        $number = $product['number'] - $item['qty'];

        $up_product = $db->update("product", array("number"=>$number, "pay"=>$product['pay']+1), array("id"=>$id_product));
      }

      redirectAdmin("transaction");
    }
    else{
      $_SESSION['error'] = "Dữ liệu không thay đổi!";
      redirectAdmin("transaction");
    }
  }
  // Ngược lại, nếu status == 1
  else{
    // Chuyển về 0
    $status = 0;

    $update = $db->update("transaction", array("status" => $status), array("id" => $id));

    if ($update > 0) {
      $_SESSION['success'] = "Cập nhật thành công!";

      $sql = "SELECT product_id, qty FROM oders WHERE transaction_id = $id";
      $orders = $db->fetchsql($sql);
      foreach ($orders as $item) {
        $id_product = intval($item['product_id']);

        $product = $db->fetchID("product", $id_product);

        $number = $product['number'] + $item['qty'];

        $up_product = $db->update("product", array("number"=>$number, "pay"=>$product['pay']-1), array("id"=>$id_product));
      }

      redirectAdmin("transaction");
    }
    else{
      $_SESSION['error'] = "Dữ liệu không thay đổi!";
      redirectAdmin("transaction");
    }
  }
?>