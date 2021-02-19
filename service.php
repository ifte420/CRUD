<?php
    session_start();
    $title = "Service";
    require_once 'includes/header-adminto.php';
    require_once 'includes/nav-adminto.php';
    require_once 'includes/db-oop.php';
?>


<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-white">Service List</div>
                    <div class="card-body">
                    <table class="table table-bordered m-0">
                        <thead>
                        <tr>
                            <th>Serial Number</th>
                            <th>Service Icon</th>
                            <th>Service Name</th>
                            <th>Service Description</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num = 1;
                        $services = $db->select("services");
                        foreach($services as $service){
                        ?>
                        <tr>
                            <th><?=$num++?></th>
                            <td><h4><i class="<?=$service['service_icon']?>"></i></h4></td>
                            <td><?=$service['service_name']?></td>
                            <td><?=$service['service_description']?></td>
                            <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="service_delete.php?id=<?=$service['id']?>&service_name=<?=$service['service_name']?>" type="button" class="btn btn-danger">Delete</a>
                            </div>
                            </td>
                        </tr>
                        <?php } ?>
                    <?php 
                        if(isset($_SESSION['service_delete_status'])): ?>
                        <div class="alert alert-success">
                            <?php
                                echo $_SESSION['service_delete_status'];
                                unset($_SESSION['service_delete_status']);
                            ?>
                        </div>
                    <?php endif;?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card mt-3">
                    <div class="card-header bg-secondary text-white">Service List</div>
                    <div class="card-body">
                        <form action="service_post.php" method="POST" data-parsley-validate novalidate>
                            <div class="form-group">
                                <label for="userName">Service Icon</label>
                                <input type="text" name="icon" parsley-trigger="change" required
                                    placeholder="Service Icon" class="form-control" id="userName">
                                <a href="https://fontawesome.com/icons?d=gallery&m=free" target="blank">Font Awesome</a>
                            </div>
                            <div class="form-group">
                                <label for="emailAddress">Service Name</label>
                                <input type="text" name="name" parsley-trigger="change" required
                                    placeholder="Service Name" class="form-control" id="emailAddress">
                            </div>
                            <div class="form-group">
                                <label for="emailAddressp">Service Description</label>
                                <input type="text" name="description" parsley-trigger="change" required
                                    placeholder="Service Description" class="form-control" id="emailAddressp">
                            </div>
                            <div class="form-group text-left m-b-0">
                                <button class="btn btn-secondary waves-effect waves-light" type="submit">
                                    Submit
                                </button>
                            </div>
                            <?php 
                                if(isset($_SESSION['service_empty_status'])): ?>
                                <div class="alert alert-danger">
                                    <?php
                                        echo $_SESSION['service_empty_status'];
                                        unset($_SESSION['service_empty_status']);
                                    ?>
                                </div>
                            <?php endif;?>
                            <?php 
                                if(isset($_SESSION['service_success_status'])): ?>
                                <div class="alert alert-success">
                                    <?php
                                        echo $_SESSION['service_success_status'];
                                        unset($_SESSION['service_success_status']);
                                    ?>
                                </div>
                            <?php endif;?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
<!-- </div> end wrapper -->



<?php
    require_once 'includes/footer-adminto.php';
?>