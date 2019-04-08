<!-- Sticky Footer -->
            <footer class="sticky-footer">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright © Your Website 2019</span>
                  </div>
               </div>
            </footer>
         </div>
         <!-- /.content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
      </a>
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Bạn muốn đăng xuất?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-body">Chọn "Đông ý" nếu bạn muốn đăng nhập lại!</div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                  <a class="btn btn-primary" href="<?php echo base_url() ?>login/logout.php">Đồng ý</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script src="<?php echo base_url() ?>public/admin/js/jquery.min.js"></script>
      <script src="<?php echo base_url() ?>public/admin/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="<?php echo base_url() ?>public/admin/js/jquery.easing.min.js"></script>
      <!-- Page level plugin JavaScript-->
      <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
      <script src="<?php echo base_url() ?>public/admin/js/jquery.dataTables.js"></script>
      <script src="<?php echo base_url() ?>public/admin/js/dataTables.bootstrap4.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo base_url() ?>public/admin/js/sb-admin.min.js"></script>
      <!-- Demo scripts for this page-->
      <script src="<?php echo base_url() ?>public/admin/js/demo/datatables-demo.js"></script>
      <!-- <script src="js/demo/chart-area-demo.js"></script> -->
   </body>
</html>