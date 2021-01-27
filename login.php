<title>Log In Page</title>
<?php
    session_start();
    if(isset($_SESSION['login_status'])){
        header('location: dashboard.php');
    }
    require_once 'includes/header.php';
    require_once 'includes/nav.php';
?>
<div class="row">
    <div class="col-lg-9 m-auto">
        <div class="card mt-5">
            <h5 class="card-header text-center bg-primary text-white">Log From</h5>
            <div class="card-body">
                <form action="login_post.php" method="POST">
                <?php
                        if(isset($_SESSION['email_password_error'])){
                            ?>
                            <div class="alert alert-danger">
                            <?php
                            echo $_SESSION['email_password_error'];
                            unset($_SESSION['email_password_error']);
                            ?>
                            </div>
                        <?php }
                    ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email_address" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>