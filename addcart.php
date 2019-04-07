<?php  
	require_once __DIR__. "/autoload/autoload.php";

	if (!isset($_SESSION['name_id'])) {
		echo "<script>alert('Vui lòng đăng nhập để thêm sản phẩm này vào giỏ hàng!'); location.href='dang-nhap.php'</script>";
	}

	$id = intval(getInput('id'));


   	// Chi tiết sản phẩm
   	$product = $db->fetchID("product", $id);

   	//Nếu tồn tại giỏ hàng thì cập nhật giỏ hàng đó.
   	//
   	//Ngược lại thì tạo mới giỏ hàng.
   	if (!isset($_SESSION['cart'][$id])) {
   		//Tạo mới gỏi hàng
   		$_SESSION['cart'][$id]['name'] = $product['name'];
   		$_SESSION['cart'][$id]['thumbnail'] = $product['thumbnail'];
   		$_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price']) / 100;
   		$_SESSION['cart'][$id]['qty'] = 1;
   	}
   	else{
   		//Cập nhật giỏ hàng
   		$_SESSION['cart'][$id]['qty'] += 1;
   	}

   	echo "<script>alert('Thêm giỏ hàng thành công!'); location.href='gio-hang.php'</script>";

?>