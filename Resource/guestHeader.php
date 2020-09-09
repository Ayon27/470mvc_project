<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
session_start();
if(!isset($_SESSION['id']))
{
    header('Location: index.php');
    exit();
}
?>

<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean">
        <div class="container">
            <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span
                        class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="../391Project/home.php">Home</a></li>

                    <li class="nav-item" role="presentation"></li>
                    <li class="dropdown nav-item"><a class="dropdown-toggle nav-link" data-toggle="dropdown"
                                                     aria-expanded="false"
                                                     href="#"><?php echo $_SESSION['name']; ?></a>
                        <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation"
                                                                  href="guestProfile.php">Profile</a>
                            <a class="dropdown-item"
                               role="presentation"
                               href="Resource/logout.php">Log
                                out</a>
                    </li`>
                </ul>
            </div>
        </div>
    </nav>
</div>