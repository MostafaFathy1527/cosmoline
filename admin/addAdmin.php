<?php
include('parts/menu.php');
?>
<div class="mainContent">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td> <input type="text" name="fullName" placeholder="Enter you full name"></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td> <input type="text" name="userName" placeholder="Enter Usrername"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td> <input type="password" name="password" placeholder="Enter admin Password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class ="btn-scendory">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
<?php
include('parts/footer.php');
?>
<?php
if(isset($_POST['submit'])){
    $fullName=$_POST['fullName'];
    $userName=$_POST['userName'];
    $password=md5($_POST['password']);
    $sql= "INSERT INTO tbl_admin SET
    fullName='$fullName',
    userName='$userName',
    password='$password'
    ";
    $res = mysqli_query($conn,$sql)or die(mysqli_error());
    if($res==TRUE){
        $_SESSION['add']="admin add successful";
        header("location:".SITEURL.'admin/admin.php');  
    }
    else{
        $_SESSION['add']="admin NOT add successful";
        header("location:".SITEURL.'admin/addAdmin.php');  
    }
}


?>