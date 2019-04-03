
<?php 
   
   $open = "category";

   require_once __DIR__. "/../../autoload/autoload.php";

   $id = intval(getInput('id'));

   $EditCategory = $db->fetchID("category", $id);
   if (empty($EditCategory)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại!";
      redirectAdmin("category");
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $data = 
      [
         "name" => postInput('name'),
         "slug" => to_slug(postInput('name'))
      ];

      $error = [];

      if (postInput('name') == '') {
         $error['name'] = "Vui lòng nhập đầy đủ tên danh mục!";
      }

      //Error trống có nghĩa là không có lỗi
      if (empty($error)) {
         //Kiểm tra
         if ($EditCategory['name'] != $data['name']) {
            $isset = $db->fetchOne("category", "name = '" .$data['name']."' ");
            if (count($isset) > 0) {
               $_SESSION['error'] = "Tên danh mục đã tồn tại!";
            }
            else{
               $id_update = $db->update("category", $data, array("id"=>$id));

               if ($id_update > 0) {
                  $_SESSION['success'] = "Cập nhật thành công!";
                  redirectAdmin("category");
               }
               else{
                  $_SESSION['error'] = "Dữ liệu không thay đổi!";
                  redirectAdmin("category");
               }
            }
         }
         else{
            $id_update = $db->update("category", $data, array("id"=>$id));

            if ($id_update > 0) {
               $_SESSION['success'] = "Cập nhật thành công!";
               redirectAdmin("category");
            }
            else{
               $_SESSION['error'] = "Dữ liệu không thay đổi!";
               redirectAdmin("category");
            }
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
                  <form method="POST">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Nhập tên danh mục" value="<?php echo $EditCategory['name'] ?> ">
                        <?php if (isset($error['name'])): ?>
                           <p class="text-danger"><?php echo $error['name'] ?></p>
                        <?php endif ?>
                     </div>
                     <button type="submit" class="btn btn-primary">Lưu</button>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../../layouts/footer.php"; ?>            