<?php 
	require_once __DIR__. "/autoload/autoload.php";

	if (isset($_SESSION['name_id'])) {
		echo "<script>alert('Bạn đã đăng nhập. Bạn không thể vào trang này!'); location.href='index.php'</script>";
	}

   	$data = 
	[
		"name" => postInput('name'),
		"email" => postInput('email'),
		"phone" => postInput('phone'),
		"password" => MD5(postInput('password')),
		"address" => postInput('address')
	];

	$error = [];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	
		
		if (postInput('name') == '') {
			$error['name'] = "Vui lòng nhập đầy đủ họ tên!";
		}

		if (postInput('email') == '') {
			$error['email'] = "Vui lòng nhập email!";
		}
		else{
			$is_check = $db->fetchOne("user", " email = '".$data['email']."'");
			if ($is_check != NULL) {
				$error['email'] = "Email đã tồn tại! Mời bạn nhập email khác.";
			}
		}

		if (postInput('phone') == '') {
			$error['phone'] = "Vui lòng nhập số điện thoại!";
		}

		if (postInput('password') == '') {
			$error['password'] = "Vui lòng nhập mật khẩu!";
		}

		if (postInput('address') == '') {
			$error['address'] = "Vui lòng nhập địa chỉ!";
		}

		if ($data['password'] != MD5(postInput("re-password"))) {
			$error['re-password'] = "Mật khẩu không khớp!";
		}
		//Error trống có nghĩa là không có lỗi

		if (empty($error)) {
			$id_insert = $db->insert("user", $data);
			if ($id_insert) {
				$_SESSION['success'] = "Đăng ký thành công! Bạn vui lòng đăng nhập!";
				redirect("dang-nhap.php");
			}
			else{
				$_SESSION['error'] = "Đăng ký thất bại!";
				redirect("dang-ky.php");
			}
		}
	}
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor">
		<?php require_once __DIR__. "/partials/notification.php"; ?>
        <section class="box-main1">
            <h3 class="title-main"><a href=""> Đăng ký thành viên </a> </h3>
            <form method="POST">
				<div class="form-group">
					<label for="exampleInputEmail1">Họ và tên</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Nhập họ tên" value="<?php echo $data['name'] ?>">
					<?php if (isset($error['name'])): ?>
		            	<p class="text-danger"><?php echo $error['name'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Email</label>
					<input type="email" class="form-control" id="exampleInputPassword1" name="email" placeholder="Nhập email" value="<?php echo $data['email'] ?>">
					<?php if (isset($error['email'])): ?>
		            	<p class="text-danger"><?php echo $error['email'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Mật khẩu</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Nhập mật khẩu">
					<?php if (isset($error['password'])): ?>
		            	<p class="text-danger"><?php echo $error['password'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Nhập lại mật khẩu</label>
					<input type="password" class="form-control" id="exampleInputPassword1" name="re-password" placeholder="Nhập lại mật khẩu">
					<?php if (isset($error['re-password'])): ?>
		            	<p class="text-danger"><?php echo $error['re-password'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Số điện thoại</label>
					<input type="number" class="form-control" id="exampleInputPassword1" name="phone" placeholder="Nhập số điện thoại" value="<?php echo $data['phone'] ?>">
					<?php if (isset($error['phone'])): ?>
		            	<p class="text-danger"><?php echo $error['phone'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Địa chỉ</label>
					<input type="text" class="form-control" id="exampleInputEmail1" name="address" placeholder="Nhập địa chỉ" value="<?php echo $data['address'] ?>">
					<?php if (isset($error['address'])): ?>
		            	<p class="text-danger"><?php echo $error['address'] ?></p>
		            <?php endif ?>
				</div>
				<button type="submit" class="btn btn-primary">Đăng ký</button>
			</form>
            <!-- Nội dung -->
        </section>

    </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
                