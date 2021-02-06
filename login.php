<title>Log In Page</title>
<?php
    session_start();
    if(isset($_SESSION['login_status'])){
        header('location: dashboard.php');
    }
    require_once 'includes/header-adminto.php';
    // require_once 'includes/nav.php';
?>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>New<span>Biz</span></span></a>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold mb-0">Sign In</h4>
                </div>
                <div class="p-20">
                    <form action="login_post.php" method="POST">
                    <?php
                    if(isset($_SESSION['email_password_error'])): ?>
                        <div class="alert alert-danger">
                        <?php
                            echo $_SESSION['email_password_error'];
                            unset($_SESSION['email_password_error']);
                        ?>
                        </div>
                    <?php endif;?>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="email" class="form-control" name="email_address" placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-30">
                            <div class="col-xs-12">
                                <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <!-- end card-box-->

            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="text-muted">Don't have an account? <a href="registration page.php" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                </div>
            </div>
            
        </div>
        <!-- end wrapper page -->




<?php
    require_once 'includes/footer-adminto.php';
?>