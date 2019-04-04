
<?php 
   
   $open = "product";

   require_once __DIR__. "/../../autoload/autoload.php";

   /*
   * Danh sách danh mục sản phẩm
   */
   $category = $db->fetchAll("category");

   $id = intval(getInput('id'));

   $EditProduct = $db->fetchID("product", $id);
   if (empty($EditProduct)) {
      $_SESSION['error'] = "Dữ liệu không tồn tại!";
      redirectAdmin("product");
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $data = 
      [
         "name" => postInput('name'),
         "slug" => to_slug(postInput('name')),
         "category_id" => postInput('category_id'),
         "price" => postInput('price'),
         "content" => postInput('content'),
         "number" => postInput('number')
      ];

      $error = [];

      if (postInput('category_id') == '') {
         $error['category_id'] = "Vui lòng chọn tên danh mục!";
      }

      if (postInput('name') == '') {
         $error['name'] = "Vui lòng nhập đầy đủ tên danh mục!";
      }

      if (postInput('price') == '') {
         $error['price'] = "Vui lòng nhập giá sản phẩm!";
      }

      if (postInput('content') == '') {
         $error['content'] = "Vui lòng nhập nội dung sản phẩm!";
      }

      if (postInput('number') == '') {
         $error['number'] = "Vui lòng nhập số lượng sản phẩm!";
      }

      if (!isset($_FILES['thumbnail'])) {
          $error['thumbnail'] = "Vui lòng chọn hình ảnh sản phẩm!";
      }

      //Error trống có nghĩa là không có lỗi
      if (empty($error)) {
         //Kiểm tra
         if (isset($_FILES['thumbnail'])) {
            $file_name = $_FILES['thumbnail']['name'];
            $file_tmp = $_FILES['thumbnail']['tmp_name'];
            $file_type = $_FILES['thumbnail']['type'];
            $file_error = $_FILES['thumbnail']['error'];

            if ($file_error == 0) {
               $part = ROOT ."product/";
               $data['thumbnail'] = $file_name;
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
                  <form method="POST" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Danh mục sản phẩm</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                           <option value="">- Mời bạn chọn danh mục -</option>
                           <?php foreach ($category as $item): ?>
                              <option value="<?php echo $item['id'] ?>" <?php echo $EditProduct['category_id'] == $item['id'] ? "selected = selected" : '' ?>><?php echo $item['name'] ?></option>
                           <?php endforeach ?>
                      </select>

                        <?php if (isset($error['category_id'])): ?>
                           <p class="text-danger"><?php echo $error['category_id'] ?></p>
                        <?php endif ?>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Nhập tên sản phẩm" value="<?php echo $EditProduct['name'] ?>">
                        <?php if (isset($error['name'])): ?>
                           <p class="text-danger"><?php echo $error['name'] ?></p>
                        <?php endif ?>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="number" class="form-control" id="" name="price" placeholder="9.000.000" value="<?php echo $EditProduct['price'] ?>">
                        <?php if (isset($error['price'])): ?>
                           <p class="text-danger"><?php echo $error['price'] ?></p>
                        <?php endif ?>
                     </div>
                     <div class="form-group row">
                        <div class="col-sm-3">
                           <label for="exampleInputEmail1">Giảm giá</label>
                           <input type="number" class="form-control" id="" name="sale" placeholder="10%" value="<?php echo $EditProduct['sale'] ?>">
                           <?php if (isset($error['sale'])): ?>
                              <p class="text-danger"><?php echo $error['sale'] ?></p>
                           <?php endif ?>
                        </div>
                        <div class="col-sm-3">
                           <label for="exampleInputEmail1">Số lượng</label>
                           <input type="number" class="form-control" id="" name="number" placeholder="100" value="<?php echo $EditProduct['number'] ?>">
                           <?php if (isset($error['number'])): ?>
                              <p class="text-danger"><?php echo $error['number'] ?></p>
                           <?php endif ?>
                        </div>

                     <div class="col-sm-4">
                           <label for="exampleInputEmail1">Hình ảnh</label>
                           <input type="file" class="form-control-file" id="" name="thumbnail">
                           <?php if (isset($error['thumbnail'])): ?>
                              <p class="text-danger"><?php echo $error['thumbnail'] ?></p>
                           <?php endif ?>

                           <img src="<?php echo uploads() ?>product/<?php echo $EditProduct['thumbnail'] ?>" alt="" width="50px" height="50px">
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Nội dung</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content" value="<?php echo $EditProduct['content'] ?>"></textarea>
                        <?php if (isset($error['content'])): ?>
                           <p class="text-danger"><?php echo $error['content'] ?></p>
                        <?php endif ?>
                     </div>
                     <button type="submit" class="btn btn-primary">Lưu</button>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../../layouts/footer.php"; ?>            