
<?php 
   $open = "transaction";

   require_once __DIR__. "/../../autoload/autoload.php";

   $sqlLevel = "SELECT * FROM admin WHERE id = '".$_SESSION['admin_id']."'";

   $level = $db->fetchsql($sqlLevel);

   // $product = $db->fetch_join("product");
   $sql = "SELECT transaction.* , user.name AS nameuser, user.phone AS phoneuser FROM transaction LEFT JOIN user ON user.id = transaction.user_id ORDER BY ID DESC";

   $transaction = $db->fetchsql($sql);

   //$transaction = $db->fetchAll("transaction");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>      

            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">List Cart</li>
               </ol>
               <!-- Icon Cards-->
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-table"></i>
                     Danh sách đơn hàng
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
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Họ tên</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Số điện thoại</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending">Trạng thái</th>
                                          <?php foreach ($level as $item): ?>
                                             <?php if ($item['level'] == 1): ?>
                                                <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">Action</th>
                                             <?php endif ?>
                                          <?php endforeach ?>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php $stt = 1; foreach ($transaction as $item): ?>
                                          <tr role="row" class="odd">
                                             <td class="sorting_1"><?php echo $stt ?></td>
                                             <td><?php echo $item['nameuser'] ?></td>
                                             <td><?php echo $item['phoneuser'] ?></td>
                                             <td>
                                             	<a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] == 0 ? 'btn-danger' : 'btn-info' ?>"><?php echo $item['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>
                                             </td>
                                             <?php foreach ($level as $item): ?>
                                                <?php if ($item['level'] == 1): ?>
                                                   <td>
                                                      <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-times"></i> Xóa</a>
                                                   </td>
                                                <?php endif ?>
                                             <?php endforeach ?>
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