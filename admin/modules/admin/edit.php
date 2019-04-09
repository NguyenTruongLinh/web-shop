
<?php 
   
   $open = "admin";

   require_once __DIR__. "/../../autoload/autoload.php";

   /*
   * Danh sách danh mục sản phẩm
   */
   

   $id = intval(getInput('id'));

   $EditAdmin = $db->fetchID("admin", $id);
   if (empty($EditAdmin)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại!";
      redirectAdmin("admin");
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $data = 
      [
         "name" => postInput('name'),
	     "email" => postInput('email'),
	     "phone" => postInput('phone'),
	     //"password" => MD5(postInput('password')),
	     "address" => postInput('address'),
	     "level" => postInput('level')
      ];

      $error = [];

      if (postInput('name') == '') {
         $error['name'] = "Vui lòng nhập đầy đủ họ tên!";
      }
      
      if (postInput('email') == '') {
         $error['email'] = "Vui lòng nhập đầy đủ họ tên!";
      }
      else{
         if (postInput("email") != $EditAdmin['email']) {
            $is_check = $db->fetchOne("admin", " email = '".$data['email']."'");
            if ($is_check != NULL) {
               $error['email'] = "Email đã tồn tại!";
            }
         }
      }

      if (postInput('phone') == '') {
         $error['phone'] = "Vui lòng nhập số điện thoại!";
      }

      // if (postInput('password') == '') {
      //    $error['password'] = "Vui lòng nhập mật khẩu!";
      // }

      if (postInput('address') == '') {
         $error['address'] = "Vui lòng nhập địa chỉ!";
      }

      // if ($data['password'] != MD5(postInput("re-password"))) {
      //    $error['password'] = "Mật khẩu không khớp!";
      // }

      if (postInput('password') != NULL && postInput("re-password") != NULL) {
      	if (postInput('password') != postInput('re-password')) {
      		$error['re-password'] = "Mật khẩu đổi lại không khớp!";
      	}
      	else{
      		$data['password'] = MD5(postInput("password"));
      	}

      }

      //Error trống có nghĩa là không có lỗi
      if (empty($error)) {
         $id_update = $db->update("admin", $data, array("id"=>$id));
         if ($id_update) {
     		$_SESSION['success'] = "Cập nhật thành công!";
        	redirectAdmin("admin");
         }
         else{
         	$_SESSION['error'] = "Cập nhật thất bại!";
            redirectAdmin("admin");
         }
      }
   }
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>      

            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="../../modules/index.php">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">
                     <a href="index.php">Danh mục</a>
                  </li>
                  <li class="breadcrumb-item active">Thêm mới</li>
               </ol>
               <!-- Icon Cards-->
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-table"></i>
                     Thêm mới danh mục
                  </div>
                  <div class="clearfix"></div>
                  <!-- Thông báo lỗi -->
                  <?php require_once __DIR__. "/../../../partials/notification.php"; ?> 
               </div>
               <div class="card-body">
                  <form method="POST" enctype="multipart/form-data">
			         
			         <div class="form-group">
			            <label for="exampleInputEmail1">Họ và tên</label>
			            <input type="text" class="form-control" id="" name="name" placeholder="Nhập họ tên" value="<?php echo $EditAdmin['name'] ?>">
			            <?php if (isset($error['name'])): ?>
			            	<p class="text-danger"><?php echo $error['name'] ?></p>
			            <?php endif ?>
			         </div>
			         <div class="form-group">
			            <label for="exampleInputEmail1">Email</label>
			            <input type="email" class="form-control" id="" name="email" placeholder="Nhập email" value="<?php echo $EditAdmin['email'] ?>">
			            <?php if (isset($error['email'])): ?>
			            	<p class="text-danger"><?php echo $error['email'] ?></p>
			            <?php endif ?>
			         </div>
			         <div class="form-group">
			            <label for="exampleInputEmail1">Số điện thoại</label>
			            <input type="phone" class="form-control" id="" name="phone" placeholder="Nhập số điện thoại" value="<?php echo $EditAdmin['phone'] ?>">
			            <?php if (isset($error['phone'])): ?>
			            	<p class="text-danger"><?php echo $error['phone'] ?></p>
			            <?php endif ?>
			         </div>
			         <div class="form-group row">
			         	<div class="col-sm-6">
				            <label for="exampleInputEmail1">Mật khẩu</label>
				            <input type="password" class="form-control" id="" name="password" placeholder="Nhập mật khẩu">
				            <?php if (isset($error['password'])): ?>
				            	<p class="text-danger"><?php echo $error['password'] ?></p>
				            <?php endif ?>
			            </div>
			            <div class="col-sm-6">
				            <label for="exampleInputEmail1">Nhập lại mật khẩu</label>
				            <input type="password" class="form-control" id="" name="re-password" placeholder="Nhập lại mật khẩu">
				            <?php if (isset($error['re-password'])): ?>
				            	<p class="text-danger"><?php echo $error['re-password'] ?></p>
				            <?php endif ?>
			            </div>
			         </div>
			         <div class="form-group">
			            <label for="exampleInputEmail1">Địa chỉ</label>
			            <input type="text" class="form-control" id="" name="address" placeholder="Nhập địa chỉ" value="<?php echo $EditAdmin['address'] ?>">
			            <?php if (isset($error['address'])): ?>
			            	<p class="text-danger"><?php echo $error['address'] ?></p>
			            <?php endif ?>
			         </div>
			         <div class="form-group">
			            <label for="exampleInputEmail1">Level</label>
			            <select class="form-control" id="exampleFormControlSelect1" name="level">
					      	<option value="1" <?php echo isset($EditAdmin['level']) &&  $EditAdmin['level'] == 1 ? "selected = 'selected'" : '' ?>>Admin</option>
					      	<option value="2" <?php echo isset($EditAdmin['level']) &&  $EditAdmin['level'] == 2 ? "selected = 'selected'" : '' ?>>CTV</option>
					    </select>
			         </div>
			         <button type="submit" class="btn btn-primary">Lưu</button>
			      </form>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../../layouts/footer.php"; ?>            