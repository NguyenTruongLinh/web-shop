
<?php 
   require_once __DIR__. "/../autoload/autoload.php";

   $category = $db->fetchAll("category");
?>

<?php require_once __DIR__. "/../layouts/header.php"; ?>      

            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Overview</li>
               </ol>
               <!-- Icon Cards-->
               <div class="row">
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-comments"></i>
                           </div>
                           <div class="mr-5">26 New Messages!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-list"></i>
                           </div>
                           <div class="mr-5">11 New Tasks!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-shopping-cart"></i>
                           </div>
                           <div class="mr-5">123 New Orders!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 mb-3">
                     <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                           <div class="card-body-icon">
                              <i class="fas fa-fw fa-life-ring"></i>
                           </div>
                           <div class="mr-5">13 New Tickets!</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                        <i class="fas fa-angle-right"></i>
                        </span>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
            <!-- /.container-fluid -->
 
 <?php require_once __DIR__. "/../layouts/footer.php"; ?>            