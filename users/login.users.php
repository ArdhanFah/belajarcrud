<?php 
require('../layout/header.layout.php');
?>

<div class="d-flex justify-content-center">
    <div class="col-xl-5 col-lg-5 col-md-5 col-11">
        <div class="text-center mt-5">
            <img src="../layout/static/logo.png" alt="campus" width="400vh">
        </div>
        <div class="card justsify-content-center mt-5">
            <form action="" method="POST" class="card-body form-horizontal p-3">
                <div class="mb-3">
                    <label for="uname" class="form-label">Username<span class="text-danger"> *</span></label>
                    <input type="text" id="uname" name="uname" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="fpass" class="form-label">Password<span class="text-danger"> *</span></label>
                    <input type="password" id="fpass" name="fpass" class="form-control" required>
                </div>
                <div class="mb-1">
                    <button class="btn btn-sm float-end"
                        style="background-color:orange;font-family:'Courier New', Courier, monospace" name="submit">Log
                        In</button>
                    <a href="register.users.php" class="text-secondary"
                        style="text-decoration: none; font-family:'Courier New', Courier, monospace; font-size:10px">i
                        don't have an account</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require('../layout/footer.layout.php');
require('../config/app.config.php');

if(isset($_POST['submit'])){
    $uname = $_POST['uname'];
    $fpass = $_POST['fpass'];
    
    $check_usr = pg_query($db, "SELECT * FROM tbl_usr WHERE uname='$uname'");
    while($check = pg_fetch_array($check_usr)){
        $roles = $check['roles'];
        if($roles == 'admin'){

         if($uname == $check['uname']){
            if($fpass == $check['passwd']){
                header('location: ../public/admin/home.admin.php');
            }else{
                echo "<script>alert('Password anda salah')</script>";
            }
        }else{
            echo "<script>alert('Username dan Password anda salah')</script>";
        }
        }elseif($roles == 'user'){
            if($uname == $check['uname']){
                if($fpass == $check['passwd']){
                    header('location: ../public/users/home.users.php');
                }else{
                    echo "<script>alert('Password anda salah')</script>";
                }
            }else{
                echo "<script>alert('Username dan Password anda salah')</script>";
            }
        }
    }
}

?>