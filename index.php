<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
</head>

<body>
    <div>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
            <div class="container">
            <a style="text-decoration: none; color: black; font-size: 16px; border-bottom: 1px solid grey" href="index.php">Home</a></span>
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mr-auto"></ul>
                    <span class="navbar-text actions">
                        <a class="login" href="#"></a>
                        
                </div>
            </div>
        </nav>
    </div>
    <h3 class="text-secondary text-center" style="margin-top: 20px">Are you a guest or a host?</h3>

    <div class="row" style="margin-top: 100px">
        <div class="col-md-2"></div>
        <div class="col-md-4">
            <a href="guestlogin.php" style="text-decoration: none">
            <div class="login-clean" style="background-color: #D5D7DE">
                <form method="post" action="login">
                    <h2 class="text-center" >I am a Guest</h2>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="hostlogin.php" style="text-decoration: none">
            <div class="login-clean" style="background-color: #7E7E9B">
                <form method="post" action="login">
                    <h2 class="text-center">I am a Host</h2>
                    <div class="form-group">
                    </div>
                </form>
            </div>
            </a>
        </div>
        
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>