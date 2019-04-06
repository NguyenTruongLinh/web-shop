<?php 
   require_once __DIR__. "/autoload/autoload.php";

   $sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at";
   $categoryHome = $db->fetchsql($sqlHomecate);

   $data = [];

   foreach ($categoryHome as $item) {
       $cateId = intval($item['id']);

       $sql = "SELECT * FROM product WHERE category_id = $cateId";
       $ProductHome = $db->fetchsql($sql);
       $data[$item['name']] = $ProductHome;
   }
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
                    <div class="col-md-9 bor">
                        <section id="slide" class="text-center" >
                            <img src="images/slide/sl3.jpg" class="img-thumbnail">
                        </section>

                        <section class="box-main1">

                            <?php foreach ($data as $key => $value): ?>
                                <h3 class="title-main"><a href=""> <?php echo $key ?> </a> </h3>
                            
                                <div class="showitem">
                                    <?php foreach ($value as $item): ?>
                                        <div class="col-md-3 item-product bor">
                                            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                                <img src="<?php echo uploads() ?>product/<?php echo $item['thumbnail'] ?>" class="" width="100%" height="180">
                                            </a>
                                            <div class="info-item">
                                                <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
                                                <?php if ($item['sale'] > 0): ?>
                                                    <p><strike class="sale"><?php echo formatPrice($item['price']) ?> đ</strike> <b class="price"><?php echo formatPriceSale($item['price'], $item['sale']) ?> đ</b></p>
                                                <?php else : ?>
                                                    <p><b><?php echo formatPrice($item['price']) ?> đ</b></p>
                                                <?php endif ?>
                                                
                                            </div>
                                            <div class="hidenitem">
                                                <p><a href=""><i class="fa fa-search"></i></a></p>
                                                <p><a href=""><i class="fa fa-heart"></i></a></p>
                                                <p><a href=""><i class="fa fa-shopping-basket"></i></a></p>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    
                                </div>
                            <?php endforeach ?>
                            
                        </section>

                    </div>
                
<?php require_once __DIR__. "/layouts/footer.php"; ?>
                