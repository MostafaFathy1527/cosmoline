<?php include ('parts/menu.php');?>
<?php
$search=$_POST['search'];
?>
    <section class="cosmoSearch text-center">
        <div class="container">
            
            <h2>products on Your Search <a href="#" class="text-white">"<?php  echo $search; ?>"</a></h2>

        </div>
    </section>


    <section class="products">
        <div class="container">
            <?php
            $sql="SELECT * FROM product  WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if ($count>0){
                while($rows=mysqli_fetch_assoc($res)){
                    $ID=$rows['ID'];
                    $title=$rows['title'];
                    $price=$rows['price'];
                    $description=$rows['description'];
                    $image_name=$rows['imageName'];
                    ?>
            <div class="productBox">
                <div class="product-img">
                    <?php
                if($image_name==""){
                                    echo "<div class 'error'>IMAGE NOT AVAILABLE</div>";
                                }
                                else{
                                    ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo $image_name; ?>" alt="title" class="img-responsive  img-curved" height="200px">
                                    <?php
                                }
                                ?>
                </div>
                <div class="product-desc">
                    <h4><?php echo $title;?> </h4>
                    <p class="product-price"><?php echo $price.'EGP'?></p>
                    <br>
                    <a href="#" class="btn">Order Now</a>
                </div>
            </div>
        </div>
        <?php
                }
            }
            else{
                echo "<div class 'error'>NO PRODUCT ADD</div>";

            }
            ?>
            <div class="clearfix"></div>

    </section>
    <?php include ('parts/footer.php');?>
