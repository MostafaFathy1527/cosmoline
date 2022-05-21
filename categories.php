<?php include ('parts/menu.php');?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore categories</h2>
            <?php
                        $sql=" SELECT * FROM catagorie WHERE active='yes'";
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
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" alt="title" class="img-responsive  img-curved" height="520px">
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
                            echo "<div class 'error'>NO CATEGORY ADD</div>";
                        }
            
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->
    <?php include ('parts/footer.php');?>
