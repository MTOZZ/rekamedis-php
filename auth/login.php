<?php
require_once "../_config/config.php";

if(isset($_SESSION['user'])){
    echo "<script> window.location='".base_url()."'; </script>"; 
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login RumahSakit</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url('_assets/css/bootstrap.min.css');?>" rel="stylesheet">
</head>
<style>
    body{
      
        background-image: url("../Image/ikon4.jpg");
        background-size: cover;
     }
</style>
<body>
    <div id="wrapper">
        <div class="container">
            <div align="center" style="margin-top: 250px; display: flexbox;font-weight: bold;" >
                <?php
                if(isset($_POST['login'])){
                    $user = $_POST['user'];
                    $pass = $_POST['pass'];

                    

                    $sql_login = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE username ='$user' AND password = '$pass'") or die (mysqli_error($koneksi));
                    $final = mysqli_fetch_assoc($sql_login);
                    $status = $final['level'];
                    $_SESSION['status'] = $status;
                    if(mysqli_num_rows($sql_login) > 0){
                        $_SESSION['user'] = $user;
                        echo "<script> window.location='".base_url()."'; </script>";
                    }else{?>
                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <a href="#" class="close" data-dismis="alert" aria-label="close"></a>
                                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                    <strong>Login gagal!</strong> Username/password salah
                                </div>
                            </div>
                        </div>
                      <?php  
                    }                
                }   
                ?>
                    <form action="" method="post" class="navbar-form">
                    
                    <div class="box" style="margin: 10px; font-weight: bold; font-size: 25px;">
                        <span class="label label-info">Form Login</span>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" name="user" class"form-control" placeholder="Username" required autofocus>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" name="pass" class"form-control" placeholder="Password" required autofocus>
                    </div>
                    <div class=btn">
                        <input type="submit" name="login" class="btn btn-danger" value="Login">
                    </div>
                </form>
            </div>
    </div>
    <script src="<?= base_url('_assets/js/jquery.js')?>"></script>
    <script src="<?= base_url('_assets/js/bootstrap.min.js')?>"></script>
</body>

</html>
<?php
}
?>