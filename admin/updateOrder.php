<?php include('parts/menu.php')?>
<div class="mainContent">
    <div class="wrapper">
        <h1>Update Order</h1>
        <br> <br>
        <?php
        if(isset($_GET['id'])){
            $ID=$_GET['id'];
            $sql=" SELECT * FROM tbl_order WHERE ID=$ID";
            $res=mysqli_query($conn,$sql);
            $count = mysqli_num_rows($res);
            if($count==1){
                $row=mysqli_fetch_assoc($res);
                $product=$row['product'];
                $price=$row['price'];
                $qty=$row['qty'];
                $satus=$row['satus'];


            }
            else{
                header ('location:'.SITEURL.'admin/order.php');
            }
        }
        else{
            header ('location:'.SITEURL.'admin/order.php');
        }
        ?>
        <form action=""method="POST">
            <table class="tbl-30">
            <tr>
                <td>product name</td>
                <td><?php echo $product; ?></td>
            </tr>
            <tr>
                <td>price</td>
                <td>
                    $ <?php echo $price; ?>
                </td>
            </tr>
            <tr>
                <td>qty</td>
                <td><input type="number" name="qty" value="<?php echo $qty ?>"></td>
            </tr>
            <tr>
                <td>Status</td>
                <td>
                    <select name="satus">
                        <option <?php if($satus=="ordered") {echo "selected";} ?> value="ordered">ordered</option>
                        <option <?php if($satus=="on delivery") {echo "selected";} ?> value="on delivery">on delivery</option>
                        <option <?php if($satus=="delivered") {echo "selected";} ?> value="delivered">delivered</option>
                        <option <?php if($satus=="cancelled") {echo "selected";} ?> value="cancelled">cancelled</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value ="<?php echo $ID; ?>">
                    <input type="hidden" name="price" value ="<?php echo $price; ?>">
                    <input type="submit" value="update order" name="submit" class="btn-primary">
                </td>
            </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit'])){
            $id=$_POST['id'];
            $price=$_POST['price'];
            $qty=$_POST['qty'];
            $total=$price*$price;
            $satus=$_POST['satus'];
            $custName=$row['custName'];
            $custContact=$row['custContact'];
            $custEmail=$row['custEmail'];
            $custAddreess=$row['custAddreess'];
            $sql2="UPDATE tbl_order SET
            qty=$qty,
            total=$total,
            satus='$satus'
            WHERE ID=$ID
            ";
            $res2=mysqli_query($conn,$sql2);
            if($res2==true){
                $_SESSION['update']="<div class='success'> order updated </div>";
                header('location:'.SITEURL.'admin/order.php');
            }
            else{
                $_SESSION['update']="<div class='success'> order NOT updated </div>";
                header('location:'.SITEURL.'admin/order.php');
            }
        }
        ?>
    </div>
</div>
<?php include('parts/footer.php')?>