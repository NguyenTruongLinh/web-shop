
<?php 
   $open = "product";

   require_once __DIR__. "/../../autoload/autoload.php";

   

   $product = $db->fetch_join("product");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>      

            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Sản phẩm</li>
               </ol>
               <!-- Icon Cards-->
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-table"></i>
                     Sản phẩm
                     <div class="float-right">
                        <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm mới</a>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <!-- Thông báo lỗi -->
                  <?php require_once __DIR__. "/../../../partials/notification.php"; ?>  
                  
                  <div class="card-body">
                     <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                           
                           <div class="row">
                              <div class="col-12">
                                 <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending">STT</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Name</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Danh mục</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Slug</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Thumbnail</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">Thông tin</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php $stt = 1; foreach ($product as $item): ?>
                                          <tr role="row" class="odd">
                                             <td class="sorting_1"><?php echo $stt ?></td>
                                             <td><?php echo $item['name'] ?></td>
                                             <td><?php echo $item['namecate'] ?></td>
                                             <td><?php echo $item['slug'] ?></td>
                                             <td>
                                             	<img src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>" width="50px" height="50px">
                                             </td>
                                             <td>
                                             	<ul>
                                             		<li>Giá: <?php echo $item['price'] ?></li>
                                             		<li>Số lượng: <?php echo $item['number'] ?></li>
                                             	</ul>
                                             </td>
                                             <td>
                                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-edit"></i> Sửa</a>
                                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>
                                             </td>
                                          </tr>
                                       <?php $stt++; endforeach ?>
                                       
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           
                        </div>
                     </div>
                  </div>
                  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../../layouts/footer.php"; ?>            