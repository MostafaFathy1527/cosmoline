<?php include ('parts/menu.php');?>

    <section class="cosmoSearch    text-center     ">
        <div class="container">
            <form action="<?php echo SITEURL;?>products-search.php" method="POST">
                <input type="search" name="search" placeholder="Search For A Product.."> 
                <input type="submit" name="submit" value="Search" class="btn">
            </form>
        </div>
    </section>



    <section class="products">
        <div class="container">
            <h2 class="text-center">Explore products</h2>
            <?php
                        $sql=" SELECT * FROM product WHERE active='yes'";
                        $res = mysqli_query($conn,$sql);
                        $count =mysqli_num_rows($res);
                        if($count>0)
                        {
                            while($rows=mysqli_fetch_assoc($res))
                            {
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
                                <?php
                            }
                        }
                        else{
                            echo "<div class 'error'>NO producrs ADD</div>";
                        }
            
            ?>
            <div class="clearfix"></div>

    </section>

    <?php include ('parts/footer.php');?>
