<title>Registration Page</title>
<?php
    session_start();
    require_once 'includes/header.php';
    require_once 'includes/nav.php';
?>
<div class="row">
    <div class="col-lg-9 m-auto">
        <div class="card mt-5">
            <h5 class="card-header text-center bg-info text-white">Registration</h5>
            <div class="card-body">
                <form action="registration_post.php" method="POST">
                    <div class="form-group">
                    <?php
                        if(isset($_SESSION['fill up'])){
                            ?>
                            <div class="alert alert-danger">
                            <?php
                            echo $_SESSION['fill up'];
                            unset($_SESSION['fill up']);
                            ?>
                            </div>
                        <?php }
                    ?>
                        <label for="exampleInput">Full Name</label>
                        <input type="text" class="form-control" id="exampleInput" placeholder="Enter Your Full Name" name="full_name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email" name="email_address">
                    <?php
                        if(isset($_SESSION['uniq_email'])):?>
                        <small class="text-danger">
                            <?php
                            echo $_SESSION['uniq_email'];
                            unset($_SESSION['uniq_email']);?>
                        </small>
                        <?php
                        endif;
                    ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password">
                    </div>
                    <?php
                        if(isset($_SESSION['cnf_err'])):
                        ?>
                        <div class="alert alert-danger">
                        <?php
                            echo $_SESSION['cnf_err'];
                            unset($_SESSION['cnf_err']);
                        ?>
                        </div>
                            <?php
                        endif;
                    ?>
                    <div class="form-group">
                        <label for="exampleInputPassword2">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Enter Your Confirm Password" name="confirm_password">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other">Other</label>
                    </div>
                    <button type="submit" class="btn btn-outline-info">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    require_once 'includes/footer.php';
?>