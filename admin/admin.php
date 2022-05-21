<?php
include('parts/menu.php');
?>
<div class="mainContent">
    <div class="wrapper">
        <h1>ADMIN PAGE</h1>
        <br>
        <?php
        if(isset($_SESSION['add'])){
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>
        <br/><br/>
        <a href="addAdmin.php"class="btn-primary">ADD ADMIN</a>
        <table class="tbl-full">
            <tr>
                <th>ID</th>
                <th>FULLNAME</th>
                <th>USERNAME</th>
                <th>ACTIONS</th>
            </tr>

            <?php
            $sql="SELECT * FROM tbl_admin";
            $res=mysqli_query($conn,$sql);

            if($res==TRUE){
                $count=mysqli_num_rows($res);
                $idCont=1;
                if($count>0){
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id=$rows['ID'];
                        $fullName=$rows['fullName'];
                        $userName=$rows['userName'];
                        
                        ?>
                        <tr>
                        <td> <?php echo $idCont++; ?> </td>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo $userName; ?></td>
                        <td>
                            <a href="#" class="btn-scendory">Udate admin</a>
                            <a href="#" class="btn-danger">Delete admin</a>
                        </td>
                        </tr>

                        <?php
                    }
                }
            }
            ?>

        </table>
    </div>
</div>
<?php
include('parts/footer.php');
?>