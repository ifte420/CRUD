<?php
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/header.php';
    require_once 'includes/nav.php';
?>
<title>profile Page</title>
<div class="row">
    <div class="col-lg-9 m-auto">
        <div class="card mt-5">
            <h5 class="card-header text-center bg-info text-white">Change Password</h5>
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
                        <input type="checkbox" class="form-check-input" id="show_password">
                        <label class="form-check-label" for="show_password" onclick="show_password()">Show Password</label>
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
                    </div>
  
                    <div class="form-group">
                        <label for="confirm_password">confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                    </div>
                    <button type="submit" class="btn btn-outline-info">Change Password</button>
                </form>
            </div>
        </div>
    </div>
</div>