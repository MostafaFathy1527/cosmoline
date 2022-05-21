<?php include ('parts/menu.php');?>

    <section class="cosmoSearch    text-center     ">
        <div class="container">
            <form action="<?php echo SITEURL ?>products-search.php" method="POST">
                <input type="search" name="search" placeholder="Search For A Product..">
                <input type="submit" name="submit" value="Search" class="btn">
            </form>
        </div>
    </section>
    <?php
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset ($_SESSION['order']);
    }
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Catagories</h2>
            <?php 
            $sql=" SELECT * FROM catagorie WHERE active='yes' AND featured='yes' LIMIT 3 ";
            $res = mysqli_query($conn,$sql);
            $count =mysqli_num_rows($res);

            if($count>0)
            {
                while($rows=mysqli_fetch_assoc($res))
                {
                    $ID=$rows['ID'];
                    $title=$rows['title'];
                    $image_name=$rows['imageName'];
                ?>

                    <a href="<?php echo SITEURL; ?>category-products.php?category_id=<?php echo $ID; ?>">
                <div class="box3   float-container">
                    <?php
                    if($image_name==""){
                        echo "<div class 'error'>IMAGE NOT AVAILABLE</div>";
                    }
                    else{
                        ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="LIPSRICK" class="img-responsive  img-curved" height="520px">
                        <?php
                    }
                    ?>
                    <h3 class="float-text    text-color"><?php echo $title?></h3>
                </div>
            </a>
                    <?php
                }
            }
            else{
                echo "<div class='error'>Category not Added.</div>";
            } 
             ?>


            <div class="clearfix"></div>
        </div>
    </section>
    <section class="products">
        <div class="container">
            <h2 class="text-center">products</h2>
            <?php
            $sql2="SELECT * FROM product  WHERE active='yes' AND featured ='yes'";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if ($count2>0){
                while($rows=mysqli_fetch_assoc($res2)){
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
                    <a href="<?php echo SITEURL; ?>order.php?product_ID=<?php echo $ID; ?>" class="btn">Order Now</a>
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
