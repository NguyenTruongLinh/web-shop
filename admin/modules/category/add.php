
<?php 
   require_once __DIR__. "/../../autoload/autoload.php";


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
               </div>
               <div class="card-body">
                  <form method="POST">
                     <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" class="form-control" id="" aria-describedby="emailHelp" placeholder="Nhập tên danh mục">
                     </div>
                     <button type="submit" class="btn btn-primary">Lưu</button>
                  </form>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../../layouts/footer.php"; ?>            