<?php
    $title = "Registration Page";
    session_start();
    require_once 'includes/header-adminto.php';
?>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page">
            <div class="text-center">
                <a href="index.html" class="logo"><span>New<span>Biz</span></span></a>
            </div>
        	<div class="m-t-40 card-box">
                <div class="text-center">
                    <h4 class="text-uppercase font-bold mb-0">Register</h4>
                </div>
                <div class="p-20">
                    <form action="registration_post.php" method="POST">
						<div class="form-group ">
                        <?php
                            if(isset($_SESSION['fill up'])):?>
                                <div class="alert alert-danger">
                                <?php
                                echo $_SESSION['fill up'];
                                unset($_SESSION['fill up']);
                                ?>
                                </div>
                        <?php endif; ?>
							<div class="col-xs-12">
                                <input type="text" class="form-control" placeholder="Enter Your Full Name" name="full_name">
							</div>
						</div>

						<div class="form-group ">
							<div class="col-xs-12">
                            <input type="email" class="form-control" placeholder="Enter Your Email" name="email_address">
							</div>
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
							<div class="col-xs-12">
								<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password" name="password">
							</div>
						</div>
                        <?php
                            if(isset($_SESSION['cnf_err'])):?>
                                <div class="alert alert-danger">
                                <?php
                                    echo $_SESSION['cnf_err'];
                                    unset($_SESSION['cnf_err']);
                                ?>
                                </div>
                        <?php endif; ?>
                        <div class="form-group">
							<div class="col-xs-12">
                                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Enter Your Confirm Password" name="confirm_password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <label class="custom-control custom-radio">
                                    <input id="radio1" type="radio" class="custom-control-input" name="gender" value="male">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Male</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio2" type="radio" class="custom-control-input" name="gender" value="female">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Female</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio3" type="radio" class="custom-control-input" name="gender" value="other">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Other</span>
                                </label>
                            </div>
                        </div>
						<div class="form-group text-center m-t-40 mb-0">
							<div class="col-xs-12">
								<button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">
									Register
								</button>
							</div>
						</div>
					</form>

                </div>
            </div>
            <!-- end card-box -->

			<div class="row">
				<div class="col-sm-12 text-center">
					<p class="text-muted">Already have account?<a href="login.php" class="text-primary m-l-5"><b>Sign In</b></a></p>
				</div>
			</div>

        </div>
        <!-- end wrapper page -->


<?php
    require_once 'includes/footer-adminto.php';
?>