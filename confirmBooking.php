<?php
include_once 'Resource/guestHeader.php';
include_once 'Resource/connection.php';
$placeID = $_GET['placeID'];

if (empty($placeID)) {
    header('location: home.php');
    exit();
} else {

    if (isset($_GET['checkIN']) && isset($_GET['checkOut'])) {
        $checkIn = $_GET['checkIN'];
        $checkOut = $_GET['checkOut'];
    } else {
        $checkIn = '';
        $checkOut = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="assets/css/animate.css"/>
    <link rel="stylesheet" href="assets/css/owl.carousel.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <title>Confirm Booking</title>
</head>

<body>
<?php
$userid = $_SESSION['id'];
$query = "SELECT * from listing where id = $placeID;";
$result = mysqli_query($conn, $query);
$datas = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row;
    }
}

foreach ($datas

as $data) {

$gym = "No Gym";
$pool = "No Pool";
$entireHouse = "Shared Place";

if ($data['entire_house'] == 1) {
    $entireHouse = "Entire Place";
}
if ($data['has_gym'] == 1) {
    $gym = "Has a Gym";
}
if ($data['has_pool'] == 1) {
    $pool = "Has a Pool";
}

?>
<section class="page-section">
    <div class="container" style="margin-top: 30px">
        <div class="row">

            <form class="form-control" method="post" action="Operations/bookingProcess.php" style="border: 0">
                <div class="col-lg-10">
                    <div class="single-list-slider owl-carousel" id="sl-slider">
                        <div class="sl-item set-bg">
                            <img class="img-responsive" src="assets/background.jpg" alt="">
                        </div>
                    </div>
                    <div class>
                    </div>

                    <div class="single-list-content">

                        <div class="row">
                            <div class="col-xl-8 sl-title">
                                <h2>
                                    <?php echo $data['name']; ?>
                                </h2>
                                <p>
                                    <?php echo $data['address']; ?>
                                    <h10>,</h10>
                                    <?php echo $data['state']; ?>
                                    <h10>,</h10>
                                    <?php echo $data['country']; ?>
                                </p>
                            </div>
                            <div class="col-xl-4">
                            </div>
                        </div>

                        <h3 class="sl-sp-title">Details</h3>
                        <div class="row property-details-list">
                            <div class="col-md-4 col-sm-6">
                                <p>
                                    <?php echo $entireHouse; ?>
                                </p>
                                <p>Rooms:
                                    <?php echo $data['bedrooms']; ?>
                                </p>
                                <p>Rent:
                                    <?php echo $data['price']; ?> / Night
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <p>
                                    <?php echo $gym; ?>
                                </p>
                                <p>
                                    Washrooms:
                                    <?php echo $data['washrooms']; ?>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>
                                    <?php echo $pool; ?>
                                </p>
                                <p>
                                    Host:
                                    <?php echo $data['hostName']; ?>
                                </p>
                            </div>
                        </div>
                        <h3 class="sl-sp-title bd-no"></h3>
                        <div id="accordion" class="plan-accordion">
                            <div class="panel">
                                <div class="panel-header" id="headingOne">
                                    <button style="background-color: #88BDE9; border: none" class="panel-link active"
                                            data-toggle="collapse" data-target="#confirmMsg" role="button"
                                            aria-expanded="false" aria-controls="confirm"><b
                                                style="margin-left: 45%; font-size: 24px">Book</b></button>
                                </div>

                                <div class="collapse" id="confirmMsg">
                                    <div class="card card-body" style="border: 0">
                                        <input type="hidden" name="placeID" value="<?php echo $placeID ?>">
                                        <input type="hidden" name="checkIn" value="<?php echo $checkIn ?>">
                                        <input type="hidden" name="checkOut" value="<?php echo $checkOut ?>">
                                        <p class="text-center" style="font-size: 24px"> Are you sure?
                                            <a href="Operations/bookingProcess.php">
                                                <button class="btn btn-success"
                                                        style="margin-left: 10px; background-color: #7abaff; border: none"
                                                >
                                                    Yes, Book now
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-success" data-toggle="collapse"
                                                    data-target="#confirmMsg"
                                                    style="margin-left: 10px; background-color: #7abaff; min-width: 60px; border: none">
                                                No
                                            </button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
            </form>
        </div>
    </div>

</section>

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/masonry.pkgd.min.js"></script>
<script src="assets/js/magnific-popup.min.js"></script>
<script src="assets/js/main.js"></script>
</body>

</html>

