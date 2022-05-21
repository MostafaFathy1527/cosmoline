<?php include ('parts/menu.php');?>
<?php 
if(isset($_GET['product_ID'])){
    $product_ID=$_GET['product_ID'];

    $sql="SELECT * FROM product WHERE ID=$product_ID ";
    $res=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($res);
    if($count==1){
        $row=mysqli_fetch_assoc($res);
        $title=$row['title'];
        $price=$row['price'];
        $imageName=$row['imageName'];
    }
    else{
        header('location:'.SITEURL);
    }
}
else{
    header('location:'.SITEURL);
}
?>
    <section class="cosmoSearch">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                <legend>Selected product</legend>

                    <div class="product-img">
                    <?php 
                        if($imageName==""){
                            echo "<div class ='error'> no image</div>";
                        }
                        else{
                            ?>
                              <img src="<?php echo SITEURL; ?>images/product/<?php echo $imageName;?>" alt="<?php echo $title ?>" class="img-responsive img-curve">
                            <?php
                        }
                    ?>
                    </div>
    
                    <div class="product-desc">
                        <h3><?php echo $title ?></h3>
                        <input type="hidden" name="product" value="<?php echo $title;?>">
                        <p class="product-price"><?php echo $price.'EGP'?></p>
                        <input type="hidden" name="price" value="<?php echo $price.'EGP'?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. mostafa fathy" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 01017xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. mostafafathy1503@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn">
                </fieldset>

            </form>
            <?php
            if(isset($_POST['submit'])){
                $product=$_POST['product'];
                $price=$_POST['price'];
                $qty=$_POST['qty'];
                $total=$qty*$price;

                $orderDate=date("y-m-d h:i:sa");
                $satus="ordered";
                
                $custName=$_POST['full-name'];
                $custContact=$_POST['contact'];
                $custEmail=$_POST['email'];
                $custAddreess=$_POST['address'];

                $sql2="INSERT INTO tbl_order SET
                product='$product',
                price=$price,
                qty=$qty,
                total=$total,
                orderDate='$orderDate',
                satus='$satus',
                custName='$custName',
                custContact='$custContact',
                custEmail='$custEmail',
                custAddreess='$custAddreess'
                ";
                $res2=mysqli_query($conn,$sql2);
                if($res2==true){
                    $_SESSION['order']="<div class ='success'>order placed successfully.</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['order']="<div class ='error'>order NOT placed successfully.</div>";
                    header('location:'.SITEURL);
                }
            }
            ?>

            </div>
    </section>

    <?php include ('parts/footer.php');?>
