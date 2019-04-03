
<?php 
   require_once __DIR__. "/../../autoload/autoload.php";


?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>      

            <div class="container-fluid">
               <!-- Breadcrumbs-->
               <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                     <a href="#">Dashboard</a>
                  </li>
                  <li class="breadcrumb-item active">Danh mục</li>
               </ol>
               <!-- Icon Cards-->
               <div class="card mb-3">
                  <div class="card-header">
                     <i class="fas fa-table"></i>
                     Danh mục sản phẩm
                     <div class="float-right">
                        <a href="add.php" class="btn btn-success"><i class="fas fa-plus-circle"></i> Thêm mới</a>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                           
                           <div class="row">
                              <div class="col--12">
                                 <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                       <tr role="row">
                                          <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" aria-sort="ascending" style="width: 178px;">Name</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 276px;">Position</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 131px;">Office</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 58px;">Age</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 123px;">Start date</th>
                                          <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 105px;">Salary</th>
                                       </tr>
                                    </thead>
                                    <tfoot>
                                       <tr>
                                          <th rowspan="1" colspan="1">Name</th>
                                          <th rowspan="1" colspan="1">Position</th>
                                          <th rowspan="1" colspan="1">Office</th>
                                          <th rowspan="1" colspan="1">Age</th>
                                          <th rowspan="1" colspan="1">Start date</th>
                                          <th rowspan="1" colspan="1">Salary</th>
                                       </tr>
                                    </tfoot>
                                    <tbody>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1">Airi Satou</td>
                                          <td class="">Accountant</td>
                                          <td>Tokyo</td>
                                          <td>33</td>
                                          <td>2008/11/28</td>
                                          <td>$162,700</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Angelica Ramos</td>
                                          <td class="">Chief Executive Officer (CEO)</td>
                                          <td>London</td>
                                          <td>47</td>
                                          <td>2009/10/09</td>
                                          <td>$1,200,000</td>
                                       </tr>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1">Ashton Cox</td>
                                          <td class="">Junior Technical Author</td>
                                          <td>San Francisco</td>
                                          <td>66</td>
                                          <td>2009/01/12</td>
                                          <td>$86,000</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Bradley Greer</td>
                                          <td class="">Software Engineer</td>
                                          <td>London</td>
                                          <td>41</td>
                                          <td>2012/10/13</td>
                                          <td>$132,000</td>
                                       </tr>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1">Brenden Wagner</td>
                                          <td class="">Software Engineer</td>
                                          <td>San Francisco</td>
                                          <td>28</td>
                                          <td>2011/06/07</td>
                                          <td>$206,850</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Brielle Williamson</td>
                                          <td class="">Integration Specialist</td>
                                          <td>New York</td>
                                          <td>61</td>
                                          <td>2012/12/02</td>
                                          <td>$372,000</td>
                                       </tr>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1">Bruno Nash</td>
                                          <td class="">Software Engineer</td>
                                          <td>London</td>
                                          <td>38</td>
                                          <td>2011/05/03</td>
                                          <td>$163,500</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Caesar Vance</td>
                                          <td class="">Pre-Sales Support</td>
                                          <td>New York</td>
                                          <td>21</td>
                                          <td>2011/12/12</td>
                                          <td>$106,450</td>
                                       </tr>
                                       <tr role="row" class="odd">
                                          <td class="sorting_1">Cara Stevens</td>
                                          <td class="">Sales Assistant</td>
                                          <td>New York</td>
                                          <td>46</td>
                                          <td>2011/12/06</td>
                                          <td>$145,600</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Cedric Kelly</td>
                                          <td class="">Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>
                                          <td>$433,060</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Cedric Kelly</td>
                                          <td class="">Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>
                                          <td>$433,060</td>
                                       </tr>
                                       <tr role="row" class="even">
                                          <td class="sorting_1">Cedric Kelly</td>
                                          <td class="">Senior Javascript Developer</td>
                                          <td>Edinburgh</td>
                                          <td>22</td>
                                          <td>2012/03/29</td>
                                          <td>$433,060</td>
                                       </tr>
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