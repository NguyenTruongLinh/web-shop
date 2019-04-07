<?php 
   	require_once __DIR__. "/autoload/autoload.php";

   	$user = $db->fetchID('user', intval($_SESSION['name_id']));

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$data = [
			'amount' => $_SESSION['total'],
			'user_id' => $_SESSION['name_id'],
			'note' => postInput("note")
		];

		$idtran = $db->insert("transaction", $data);

		if ($idtran > 0) {
			foreach ($_SESSION['cart'] as $key => $value) {
				$data2 = [
					'transaction_id' => $idtran,
					'product_id' => $key,
					'qty' => $value['qty'],
					'price' => $value['price']
				];

				$id_insert = $db->insert("oders", $data2);
			}

			unset($_SESSION['cart']);
   			unset($_SESSION['total']);

			$_SESSION['success'] = "Lưu thông tin đơn hàng thành công. Chúng tôi sẽ liên hệ bạn sớm nhất!";
			header("location: thong-bao.php");
		}
	}
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
                    <div class="col-md-9">

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Thanh toán đơn hàng </a> </h3>
                            <form method="POST">
								<div class="form-group">
									<label for="exampleInputEmail1">Họ và tên</label>
									<input type="text" readonly="" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập họ tên" value="<?php echo $user['name'] ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input type="email" readonly="" class="form-control" id="exampleInputPassword1" name="email" placeholder="Nhập email" value="<?php echo $user['email'] ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Số điện thoại</label>
									<input type="number" readonly="" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Nhập số điện thoại" value="<?php echo $user['phone'] ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Địa chỉ</label>
									<input type="text" readonly="" class="form-control" id="exampleInputEmail1" name="address" placeholder="Nhập địa chỉ" value="<?php echo $user['address'] ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Tổng tiền thanh toán</label>
									<input type="text" readonly="" class="form-control" id="exampleInputEmail1" name="address" placeholder="Nhập địa chỉ" value="<?php echo formatPrice($_SESSION['total']) ?>">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Ghi chú</label>
									<textarea name="note" class="form-control" id="" cols="30" rows="3"></textarea>
								</div>
								<button type="submit" class="btn btn-primary">Xác nhận</button>
							</form>
                            <!-- Nội dung -->
                        </section>

                    </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
                