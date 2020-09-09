<?php include_once 'Resource/guestHeader.php';
include_once 'Resource/connection.php';
$key = $_GET['key'];
$check_in = $_GET['cinDate'];
$check_out = $_GET['coutDate'];
$guests = $_GET['guestCount'];
$useID = $_SESSION['id']
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Search</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body>
<div class="container">
    <?php
    error_reporting(E_ALL ^ E_WARNING);
    $stmt = $conn->prepare("SELECT * from listing WHERE id NOT IN (SELECT listing_id from booking WHERE check_in <= ? AND check_out >= ?)
        AND (country LIKE ? OR state LIKE ? OR address LIKE ? OR name LIKE ?) AND (guests >= ?)");
    $key1 = "%" . $key . "%";
    $stmt->bind_param("ssssssi", $check_in, $check_out, $key1, $key1, $key1, $key1, $guests);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <form class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input readonly style="border:none;  border-bottom: 1px solid #ce93d8;
              box-shadow: 0 1px 0 0 #ce93d8;" class="form-control form-control-sm ml-3 w-75" type="text"
               placeholder=""
               value="<?php echo $key; ?>">
    </form>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $gym = "No Gym";
            $pool = "No Pool";
            $entireHouse = "Shared Place";

            if ($row['entire_house'] == 1) {
                $entireHouse = "Entire Place";
            }
            if ($row['has_gym'] == 1) {
                $gym = "Has a Gym";
            }
            if ($row['has_pool'] == 1) {
                $pool = "Has a Pool";
            }
            ?>

            <a style="text-decoration: none; color: black"
               href="confirmBooking.php?placeID=<?php echo $row['id']; ?>&checkIN=<?php echo $check_in; ?>&checkOut=<?php echo $check_out; ?>">
                <div class="card" style="margin-top: 30px; margin-bottom: 100px">
                    <div class="card-body">
                        <img class="card-img-top" src="assets/download.png" alt="Card image cap"
                             style="width: 200px; margin-top: 68px; margin-left: 20px" align="left">

                        <div class='pt-4'></div>

                        <h4 class="card-title text-center"><?php echo $row['name']; ?>
                        </h4>
                        <h6 class="card-title text-center"><?php echo $row['address'] . "," . $row['state'] . "," . $row['country']; ?>
                        </h6>

                        <p class="card-text text-center"><?php echo $entireHouse . ", " . $gym . ", " . $pool; ?>
                        </p>
                        <p class="card-text text-center">Bedrooms: <?php echo $row['bedrooms']; ?> ,
                            Washrooms: <?php echo $row['washrooms']; ?>
                        </p>
                        <p class="card-text text-center">Host: <?php echo $row['hostName']; ?>
                        </p>
                        <p class="card-text text-center"><strong> For: <?php echo $row['guests']; ?> People </strong>
                        </p>
                        <p class="card-text text-center"><strong><?php echo $row['price']; ?> / Night </strong></p>
                        <input type="hidden" name="listID" value="<?php echo $row['id']; ?>">
                    </div>
                </div>
            </a>
            <?php
        }
    } else {
    ?>
   <div class="row" style = "margin: 50px auto auto auto;" >
    <i class='far fa-dizzy' style='font-size:256px; color:grey;'></i>
    <p class="text text-secondary" style="font-size: 32px; margin-top: 100px; margin-left: 50px">
        Nothing found for you that matches your criteria!
    </p>
</div>
<?php }
?>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>