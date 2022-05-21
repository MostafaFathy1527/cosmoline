<?php
include('parts/menu.php');
?>
<div class="mainContent">
    <div class="wrapper">
        <h1>Add Product</h1>
        <br> <br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset ($_SESSION['add']);
        }
        if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];
            unset ($_SESSION['upload']);
        }
        ?>
        <br> <br>
        <form action="" method="post" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>
                        Title: 
                    </td>
                    <td>
                        <input type="text" name="title" placeholder=" title">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                    description: 
                    </td>
                    <td>
                        <textarea name="description" id="" cols="30" rows="5" placeholder="description of the product"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                    price: 
                    </td>
                    <td>
                        <input type="number" name="price" id="">
                    </td>
                </tr>
                <tr>
                <tr>
                    <td>
                        image: 
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                </tr>
                <tr>
                    <td>Category: </td>
                    <td>
                        <select name="category" id="">
                            <?php
                            $sql="SELECT * FROM catagorie WHERE active='yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                    $ID=$row['ID'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $ID;?>"><?php echo $title; ?> </option>
                                    <?php
                                }
                            }
                            else{
                                ?>
                                <option value="0">NO category Found</option>
                                <?php
                            }
                            ?>
                        </select>

                    </td>
                </tr>
                <tr>
                    <td>
                        Featured: 
                    </td>
                    <td>
                    <input type="radio" name="featured" value="yes"> Yes
                    <input type="radio" name="featured" value="no"> No
                    </td>
                </tr>
                <tr>
                    <td>
                        Active: 
                    </td>
                    <td>
                    <input type="radio" name="active" value="yes"> Yes
                    <input type="radio" name="active" value="no"> No
                    </td>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit" value="Add product" class="btn-scendory">
                        </td>
                    </tr>   
            </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $title=$_POST['title'];
            $description=$_POST['description'];
            $price=$_POST['price'];
            $ID=$_POST['category'];

            if(isset($_POST['featured'])){
                $featured=$_POST['featured'];
            }
            else{
                $featured="No";
            }
            if(isset($_POST['active'])){
                $active=$_POST['active'];
            }
            else{
                $active="No";
            }
            //print_r($_FILES['image']);

            //die();
            if(isset($_FILES['image']['name'])){
                $image_name=$_FILES['image']['name'];
                $ext=end(explode('.',$image_name));
                $image_name="product_".rand(000,999).'.'.$ext;
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/product/".$image_name;
                $upload=move_uploaded_file($source_path,$destination_path);
                if($upload==false){
                    $_SESSION['upload']="<div class='error'> Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/products.php');
                    die();
                }

            }
            else{
                $image_name="";
            }
            $sql="INSERT INTO product SET 
            title='$title',
            description='$description',
            price=$price,
            imageName='$image_name',
            catagorieID='$ID',
            featured='$featured',
            active='$active'
            ";
            $res2 = mysqli_query($conn,$sql);
            if($res2==true){
                $_SESSION['add']="<div calss='success'> product Add successful </div>";
                header('location:'.SITEURL.'admin/products.php');
            }
            else{
                $_SESSION['add']="<div calss='error'> product NOT Add successful </div>";
                header('location:'.SITEURL.'admin/addProduct_.php');
            }
        }
        ?>
    </div>
</div>
<?php
include('parts/footer.php');
?>