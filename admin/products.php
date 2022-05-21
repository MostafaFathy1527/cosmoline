<?php include('parts/menu.php')?>
<div class="mainContent">
        <div class="wrapper">
            <h1>ADMIN products PAGE</h1>
            <br/> <br/>
            <a href="<?php echo SITEURL; ?>admin/addProducts.php"class="btn-primary">ADD PRODUCTS</a>
        <br> <br> <br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        ?>
        <br> <br>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>title</th>
                <th>price</th>
                <th>image</th>
                <th>featured</th>
                <th>active</th>
                <th>actions</th>
            </tr>
            <?php
            $sql="SELECT * FROM product";
            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
                $count=mysqli_num_rows($res);
                $idCont=1;
                if($count>0){
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['ID'];
                        $title=$rows['title'];
                        $price=$rows['price'];
                        $image_name=$rows['imageName'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];

                        ?>
                        <tr>
                        <td> <?php echo $idCont++; ?> </td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>

                        <td><?php 

                        if($image_name!=""){
                            ?>
                            <img src="<?php echo SITEURL;?>images/product/<?php echo $image_name; ?>" alt=""  height="200px" >
                            <?php
                        }
                        else{
                            echo"<div calss='error'>NO image</div>";
                        }
                        ?></td>
                        <td><?php echo $featured; ?></td>
                        <td><?php echo $active; ?></td>
                        <td>
                            <a href="#" class="btn-scendory">Udate product</a>
                            <a href="#" class="btn-danger">Delete product</a>
                        </td>
                        </tr>

                        <?php
                    }
                }
                else{
                    ?>
                    <tr>
                        <td  colspan="6">
                            <div class="error">No product Add</div>
                        </td>
                    </tr>
                    <?php
                }
            }
            ?>
        </table>
    </div>
</div>
        </div>
    </div>
<?php include('parts/footer.php')?>