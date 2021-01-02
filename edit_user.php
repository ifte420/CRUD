<?php
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/header.php';
    require_once 'includes/db.php';
    $id = $_GET['id'];
    $select_query = "SELECT id,full_name, email_address, gender FROM registration WHERE id = $id";
    $edit_query = mysqli_query($db_connect, $select_query);
    $assoc = mysqli_fetch_assoc($edit_query);
?>
<div class="row">
    <div class="col-lg-9 m-auto">
        <div class="card mt-5">
            <h5 class="card-header text-center bg-info text-white">Update You information</h5>
            <div class="card-body">
                <form action="edit_user_post.php" method="POST">
                    <div class="form-group">
                        <input type="hidden" value="<?= $assoc['id']?>" name="id">
                        <input type="hidden" class="form-control"  name="old_full_name" value="<?=$assoc['full_name'];?>">
                        <label for="exampleInput">Full Name</label>
                        <input type="text" class="form-control" id="exampleInput" placeholder="Enter Your Full Name" name="full_name" value="<?=$assoc['full_name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email" name="email_address" value="<?=$assoc['email_address']?>">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <br>
                        <input type="radio" id="male" name="gender" value="male" 
                        <?php
                            if($assoc['gender'] == "male"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female"
                        <?php
                            if($assoc['gender'] == "female"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="female">Female</label><br>
                        <input type="radio" id="other" name="gender" value="other"
                        <?php
                            if($assoc['gender'] == "other"){
                                echo "checked";
                            }
                        ?>
                        >
                        <label for="other">Other</label>
                    </div>
                    <button type="submit" class="btn btn-outline-info">Update</button>
                </form>
            </div> 
        </div>
    </div>
</div>
<?php
    require_once 'includes/footer.php'; 
?>