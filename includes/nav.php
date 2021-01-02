    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Hi :(:</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-nav navbar-collapse" id="navbarNav">
            <?php
                if(!isset($_SESSION['login_status']))
                {
            ?>
            <a class="nav-item nav-link" href="login.php">Log In</a>
            <a class="nav-item nav-link" href="registration page.php">Registration</a>
            <?php
            }
            ?>

            <?php if(isset($_SESSION['login_status']))
            {
            ?>
            <a class="nav-item nav-link" href="user_list.php">User_List</a>
            <a class="nav-item nav-link" href="dashboard.php">Dashboard</a>
            <a class="nav-item nav-link" href="profile.php">Profile</a>
            <a class="nav-item nav-link btn btn-danger text-white" href="logout.php">Log Out</a>
        <?php
            }?>
        </div>
    </nav>