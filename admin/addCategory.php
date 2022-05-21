<?php
include('parts/menu.php');
?>
<div class="mainContent">
    <div class="wrapper">
        <h1>Add Category</h1>
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
                        <input type="text" name="title" placeholder="Category title">
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
                            <input type="submit" name="submit" value="Add Category" class="btn-scendory">
                        </td>
                    </tr>
                </tr>
            </table>
        </form>
        <?php
        if(isset($_POST['submit']))
        {
            $title=$_POST['title'];

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
                $image_name="product_category_".rand(000,999).'.'.$ext;
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/category/".$image_name;
                $upload=move_uploaded_file($source_path,$destination_path);
                if($upload==false){
                    $_SESSION['upload']="<div class='error'> Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/addCategory.php');
                    die();
                }

            }
            else{
                $image_name="";
            }
            $sql="INSERT INTO catagorie SET 
            title='$title',
            imageName='$image_name',
            featured='$featured',
            active='$active'
            ";
            $res = mysqli_query($conn,$sql);
            if($res==true){
                $_SESSION['add']="<div calss='success'> Category Add successful </div>";
                header('location:'.SITEURL.'admin/category.php');
            }
            else{
                $_SESSION['add']="<div calss='error'> Category NOT Add successful </div>";
                header('location:'.SITEURL.'admin/addCategory.php');
            }
        }
        ?>
    </div>
</div>
<?php
include('parts/footer.php');
?>