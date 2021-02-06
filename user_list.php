<?php
    $title = "User List";
    session_start();
    if(!isset($_SESSION['login_status'])){
        header('location: login.php');
    }
    require_once 'includes/header-adminto.php';
    require_once 'includes/nav-adminto.php';
    require_once 'includes/db.php';
    $select_query = "SELECT id,full_name,email_address,gender FROM registration";
    $data_from_db = mysqli_query($db_connect, $select_query);
?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <div class="card mt-5">
                        <h5 class="card-header text-center bg-secondary text-white">User List</h5>
                        <div class="card-body">
                            <div class="d-flex justify-content-center mb-3">
                                <button type="button" class="btn btn-success mr-2">
                                    Total Users: <?=$data_from_db->num_rows?>
                                </button>
                                <a href="delete_all_user.php" type="button" class="btn btn-danger mr-2">
                                    Delete All
                                </a>
                                <?php
                                    if(isset($_SESSION['status'])): ?>
                                <button type="button" class="btn btn-danger">
                                    <?php
                                    echo $_SESSION['status'];
                                    unset($_SESSION['status']);?>
                                </button>
                                <?php
                                endif;
                                ?>
                            </div>
                            <?php
                                if(isset($_SESSION['update_name'])): ?>
                            <h5 class="alert alert-success text-center">
                                <?php
                                    echo $_SESSION['update_name'];
                                    unset($_SESSION['update_name']);?>
                            </h5>
                            <?php
                                endif;
                                ?>
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial Num</th>
                                        <th scope="col">Id</th>
                                        <th scope="col">Full Name</th>
                                        <th scope="col">Email Address</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $number = 1;
                                    foreach($data_from_db as $user_data):
                                ?>
                                    <tr>
                                        <th><?=$number++ ?></th>
                                        <td><?=$user_data['id']?></td>
                                        <td><?=ucwords($user_data['full_name'])?></td>
                                        <td><?=$user_data['email_address']?></td>
                                        <td><?=ucfirst($user_data['gender'])?></td>
                                        <td>
                                            <a class="btn btn-sm btn-outline-danger" href="user_delete.php?id=<?=$user_data['id']?> ">Delect</a>
                                            <a class="btn btn-sm btn-outline-primary" href="edit_user.php?id=<?=$user_data['id']?> ">Edit</a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    <?php
                                    if($data_from_db->num_rows == 0):
                                    ?>
                                    <tr>
                                        <td colspan="6" class="text-danger text-center">
                                            No Data Available
                                        </td>
                                    </tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>


<?php
    require_once 'includes/footer-adminto.php';
?>