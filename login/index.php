<?php  

   session_start();
   require_once __DIR__. "/../libraries/Database.php";
   require_once __DIR__. "/../libraries/Function.php";

   $db = new Database;

   $data = 
   [
      "email" => postInput('email'),
      "password" => postInput('password')
   ];

   $error = [];

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (postInput('email') == '') {
         $error['email'] = "Vui lòng nhập email!";
      }

      if (postInput('password') == '') {
         $error['password'] = "Vui lòng nhập mật khẩu!";
      }
      //Error trống có nghĩa là không có lỗi

      if (empty($error)) {
         $is_check = $db->fetchOne("admin", "email = '".$data['email']."' AND password = '".md5($data['password'])."'");

         if ($is_check != NULL) {
            $_SESSION['admin_name'] = $is_check['name'];
            $_SESSION['admin_id'] = $is_check['id'];
            echo "<script>alert('Đăng nhập thành công'); location.href='/web-shop/admin/'</script>";
         }
         else{
            $_SESSION['error'] = "Email hoặc mật khẩu không tồn tại! Vui lòng đăng nhập lại.";

         }
      }
   }

?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin</title>
      <!-- Custom fonts for this template-->
      <link href="../public/admin/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Page level plugin CSS-->
      <link href="../public/admin/css/dataTables.bootstrap4.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../public/admin/css/sb-admin.css" rel="stylesheet">
      <!-- style.css -->
      <link href="../public/admin/css/style.css" rel="stylesheet">
   </head>
   <body class="text-center">
      <form class="form-signin" method="POST">
         <img class="mb-4" src="../public/admin/images/bootstrap-solid.svg" alt="" width="72" height="72">
         <h1 class="h3 mb-3 font-weight-normal">Đăng nhập</h1>
         <label for="inputEmail" class="sr-only">Nhập email</label>
         <input type="email" id="inputEmail" class="form-control" placeholder="Nhập email" required="" autofocus="" name="email">
         <label for="inputPassword" class="sr-only">Mật khẩu</label>
         <input type="password" id="inputPassword" class="form-control" placeholder="Mật khẩu" required="" name="password">
         <div class="checkbox mb-3">
            <label>
               <input type="checkbox" value="remember-me"> Remember me
            </label>
         </div>
         <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng nhập</button>
         <?php require_once __DIR__. "/../partials/notification.php"; ?>
         <p class="mt-5 mb-3 text-muted">© 2019</p>
      </form>
   </body>
</html>