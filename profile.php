<?php
    $title = "Profile Page";
    session_start();
    require_once 'includes/header-adminto.php';
    require_once 'includes/nav-adminto.php';
    require_once 'includes/db.php';
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    $email_address = $_SESSION['email_address_for_login_page'];
    $select_query = "SELECT profile_image FROM registration WHERE email_address='$email_address'";
    $img_name_for_db = mysqli_fetch_assoc(mysqli_query($db_connect, $select_query))['profile_image'];
?>

        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mt-5">
                            <h5 class="card-header text-center bg-secondary text-white">Change Profile Picture</h5>
                            <div class="card-body">
                            <div class="text-center">
                                <img src="img/profile image/<?=$img_name_for_db?>" alt="not found" class="img-fluid rounded-circle border border-secondary" width="110px">
                                <br>
                                <?php if($img_name_for_db != "default.png"):?>
                                    <a href="delete_profile_picture.php?picture_name=<?=$img_name_for_db?>" class="btn btn-danger">Delete Picture</a>
                                <?php endif; ?>
                                    <?php
                                        if(isset($_SESSION['delete_succes'])):?>
                                    <div class="alert alert-success">
                                    <?php
                                        echo $_SESSION['delete_succes'];
                                        unset ($_SESSION['delete_succes']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>
                            </div>
                                <form action="profile_image_post.php" method="POST" enctype="multipart/form-data">
                                    <?php
                                    if(isset($_SESSION['fill_up'])):?>
                                    <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['fill_up'];
                                        unset ($_SESSION['fill_up']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Select Image</label>
                                        <input type="file" class="form-control-file" name="new_profile_image" id="exampleInputPassword1">
                                    </div>
                                    <button type="submit" class="btn btn-outline-secondary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mt-5">
                            <h5 class="card-header text-center bg-secondary text-white">Change Password</h5>
                            <div class="card-body">
                                <form action="profile_post.php" method="POST">
                                <?php
                                    if(isset($_SESSION['fill_err'])):?>
                                    <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['fill_err'];
                                        unset ($_SESSION['fill_err']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>
                                    <?php
                                    if(isset($_SESSION['chng_pass'])):?>
                                    <div class="alert alert-success">
                                    <?php
                                        echo $_SESSION['chng_pass'];
                                        unset ($_SESSION['chng_pass']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>

                                    <?php
                                    if(isset($_SESSION['cnfm_err'])):?>
                                    <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['cnfm_err'];
                                        unset ($_SESSION['cnfm_err']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>
                                    
                                    <?php
                                    if(isset($_SESSION['old_err'])):?>
                                    <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['old_err'];
                                        unset ($_SESSION['old_err']);?>
                                    </div>
                                    <?php
                                    endif;
                                    ?>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Password</label>
                                        <input type="password" class="form-control" name="old_password" id="exampleInputPassword1">
                                    </div>
                                    <div class="form-group">
                                        <label for="new_password">new_Password</label>
                                        <input type="password" class="form-control" name="new_password" id="new_password">
                                    </div>
                                    <div class="form-check">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description" onclick="show_password()">Show Password</span>
                                            <script>
                                            function show_password() {
                                            var x = document.getElementById("new_password");
                                                if (x.type === "password") {
                                                    x.type = "text";
                                                } else {
                                                    x.type = "password";
                                                }
                                            }
                                            </script>
                                        </label>
                                    </div>
                
                                    <div class="form-group">
                                        <label for="confirm_password">confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                    </div>
                                    <button type="submit" class="btn btn-outline-secondary">Change Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end container -->
        </div> <!-- end container -->

<?php
    require_once 'includes/footer-adminto.php';
?>