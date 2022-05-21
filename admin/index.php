<?php
include('parts/menu.php');
?>

<div class="mainContent">
    <div class="wrapper">
        <h1>DASHBOARD</h1>

        <div class="col4   text-center">
            <?php
                    $sql = "SELECT * FROM catagorie";
                    $res= mysqli_query ($conn,$sql);
                    $count=mysqli_num_rows($res);
                ?>
            <h1><?php echo $count ?></h1>
            <br />
            Categories
        </div>
        <div class="col4   text-center">
            <?php
                    $sql2 = "SELECT * FROM product";
                    $res2= mysqli_query ($conn,$sql2);
                    $count2=mysqli_num_rows($res2);
                ?>
            <h1><?php echo $count2 ?></h1> <br />
            products
        </div>
        <div class="col4   text-center">
            <?php
                    $sql3 = "SELECT * FROM tbl_order";
                    $res3= mysqli_query ($conn,$sql3);
                    $count3=mysqli_num_rows($res3);
                ?>
            <h1><?php echo $count3 ?></h1> <br />
            orders
        </div>
        <div class="clearFix"></div>
    </div>
</div>
<?php
include('parts/footer.php');
?>