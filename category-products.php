<?php include ('parts/menu.php');?>
<?php 
if(isset($_GET['category_id'])){
    $category_id=$_GET['category_id'];
    $sql="SELECT title FROM catagorie WHERE ID=$category_id";
    $res=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($res);
    $category_title=$row['title'];
}
else{
    header('location:'.SITEURL);
}
?>
    <section class="food-search text-center">
        <div class="container">
            
            <h2>products on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <?php
            $sql2="SELECT * FROM product WHERE catagorieID=$category_id";
            $res2=mysqli_query($conn,$sql2);
            $count2=mysqli_num_rows($res2);
            if($count2>0)
            {
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $id=$row2['ID'];
                    $title=$row2['title'];
                    $price=$row2['price'];
                    $description=$row2['description'];
                    $image_name=$row2['imageName'];
                ?>
                <a href="<?php echo SITEURL; ?>category-products.php?category_id<?php echo $id; ?>">
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
                    <a href="<?php echo SITEURL; ?>order.php?product_ID=<?php echo $id; ?>" class="btn">Order Now</a>
                </div>
            </div>
            </a>
                    <?php
                }
            }
            else{
                echo "<div class 'error'>Product not avalibal</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>

    <?php include ('parts/footer.php');?>
