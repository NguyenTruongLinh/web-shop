<?php 
   	require_once __DIR__. "/autoload/autoload.php";
   	$sum = 0;

   	if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
   		echo "<script>alert('Không có sản phẩm nào trong giỏ hàng!'); location.href='".base_url()."'</script>";
   	}
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
                    <div class="col-md-9">

                        <section class="box-main1">
                            <h3 class="title-main"><a href=""> Giỏ hàng của bạn </a> </h3>

                            <table class="table table-hover">
								<thead>
									<tr>
										<th scope="col">STT</th>
										<th scope="col">Tên sản phẩm</th>
										<th scope="col">Hình ảnh</th>
										<th scope="col">Số lượng</th>
										<th scope="col">Giá</th>
										<th scope="col">Tổng tiền</th>
										<th scope="col">Thao tác</th>
									</tr>
								</thead>
								<tbody>
									<?php $stt=1; foreach ($_SESSION['cart'] as $key => $value): ?>
											<tr>
												<td><?php echo $stt ?></td>
												<td><?php echo $value['name'] ?></td>
												<td>
													<img src="<?php echo uploads() ?>product/<?php echo $value['thumbnail'] ?>" alt="" width="80px">
												</td>
												<td width="90px">
													<input type="number" class="form-control" value="<?php echo $value['qty'] ?>" min="0">
												</td>
												<td><?php echo formatPrice($value['price']) ?></td>
												<td><?php echo formatPrice($value['price'] * $value['qty']) ?></td>
												<td>
													<a href="" class="btn btn-danger">Xóa</a>
													<a href="" class="btn btn-info">Cập nhật</a>
												</td>
											</tr>
											<?php $sum += $value['price'] * $value['qty']; $_SESSION['tongtien'] = $sum; ?>										
									<?php $stt++; endforeach ?>
								</tbody>
							</table>

							<div class="col-md-5 pull-right">
								<ul class="list-group">
									<li class="list-group-item">
										<h3>Thông tin đơn hàng</h3>
									</li>
									<li class="list-group-item">
										<span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>
										Số tiền
									</li>
									<li class="list-group-item">
										<span class="badge">10%</span>
										Thuế VAT
									</li>
									<li class="list-group-item">
										<span class="badge"><?php echo sale($_SESSION['tongtien']) ?></span>
										Giảm giá
									</li>
									<li class="list-group-item">
										<span class="badge"><?php echo $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo formatPrice($_SESSION['total']) ?></span>
										Tổng tiền thanh toán
									</li>
									<li class="list-group-item text-center">
										<a href="<?php echo base_url() ?>" class="btn btn-success">Tiếp tục mua hàng</a>
										<a href="thanh-toan.php" class="btn btn-success">Thanh toán</a>
									</li>
								</ul>
							</div>
                            
                            <!-- Nội dung -->
                        </section>

                    </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
                