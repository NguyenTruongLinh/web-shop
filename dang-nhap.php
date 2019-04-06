<?php 
   	require_once __DIR__. "/autoload/autoload.php";

   	$data = 
	[
		"email" => postInput('email'),
		"password" => postInput('password')
	];

	$error = [];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	

		if (postInput('email') == '') {
			$error['email'] = "Vui lòng nhập email!";
		}

		if (postInput('password') == '') {
			$error['password'] = "Vui lòng nhập mật khẩu!";
		}
		//Error trống có nghĩa là không có lỗi

		if (empty($error)) {
			$is_check = $db->fetchOne("user", "email = '".$data['email']."' AND password = '".md5($data['password'])."'");

			if ($is_check != NULL) {
				$_SESSION['name_user'] = $is_check['name'];
				$_SESSION['name_id'] = $is_check['id'];
				echo "<script>alert('Đăng nhập thành công'); location.href='index.php'</script>";
			}
			else{
				$_SESSION['error'] = "Email hoặc mật khẩu không tồn tại! Vui lòng đăng nhập lại.";

			}
		}
	}
   	
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <div class="col-md-9 bor">
    	<?php require_once __DIR__. "/partials/notification.php"; ?>
        <section class="box-main1">
            <h3 class="title-main"><a href=""> Đăng nhập </a> </h3>
            <form method="POST">
				<div class="form-group">
					<label for="exampleInputPassword1">Email</label>
					<input type="email" class="form-control" id="exampleInputPassword1" placeholder="Nhập email" name="email">
					<?php if (isset($error['email'])): ?>
		            	<p class="text-danger"><?php echo $error['email'] ?></p>
		            <?php endif ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Mật khẩu</label>
					<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu" name="password">
					<?php if (isset($error['password'])): ?>
		            	<p class="text-danger"><?php echo $error['password'] ?></p>
		            <?php endif ?>
				</div>
				<button type="submit" class="btn btn-primary">Đăng nhập</button>
			</form>
            <!-- Nội dung -->
        </section>

    </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>   