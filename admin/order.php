<?php include('parts/menu.php')?>
<div class="mainContent">
        <div class="wrapper">
            <h1>ADMIN order PAGE</h1>
            <br/> <br/>
            <?php
            if(isset($_SESSION['update'])){
                echo $_SESSION ['update'];
                unset($_SESSION['updated']);
            }
            ?>
            <a href="#"class="btn-primary">ADD ORDER</a>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>product</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
                <th>ordaer date</th>
                <th>status</th>
                <th>c name</th>
                <th>c number</th>
                <th>c email</th>
                <th>c addreess</th>
                <th>actions</th>


            </tr>
            <?php
            $sql="SELECT * FROM tbl_order";
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $idcount=1;
            if($count>0){
                while($row=mysqli_fetch_assoc($res)){
                    $ID=$row['ID'];
                    $product=$row['product'];
                    $price=$row['price'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $orderDate=$row['orderDate'];
                    $satus=$row['satus'];
                    $custName=$row['custName'];
                    $custContact=$row['custContact'];
                    $custEmail=$row['custEmail'];
                    $custAddreess=$row['custAddreess'];
                    ?>
            <tr>
            <td><?php echo $idcount++ ?></td>
            <td><?php echo $product?></td>
            <td><?php echo $price?></td>
            <td><?php echo $qty?></td>
            <td><?php echo $total?></td>
            <td><?php echo $orderDate?></td>
            <td><?php echo $satus?></td>
            <td><?php echo $custName?></td>
            <td><?php echo $custContact?></td>
            <td><?php echo $custEmail?></td>
            <td><?php echo $custAddreess?></td>
            <td>
                <a href="<?php echo SITEURL; ?>admin/updateOrder.php?id=<?php echo $ID ?>" class="btn-scendory">Udate order</a>
            </td>
        </tr>
        <?php
                }
            }
            else{
                echo "<tr><td colspan='12' class='error'> not available order  </td></tr>";
            }
            ?>

           
        </table>
    </div>
</div>
        </div>
    </div>
<?php include('parts/footer.php')?>