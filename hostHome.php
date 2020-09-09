<?php include_once 'Resource/header.php';
include_once 'Resource/connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
<div class="container" style="margin-top: 50px">
    <h2 class="text-center" style="margin-top: 50px; margin-bottom: 50px"><strong>My Active Listings</strong></h2>
    <div class="card-deck">
        <?php
        $userid = $_SESSION['hostid'];
        $query = "SELECT * from listing where host_id = $userid;";
        $result = mysqli_query($conn, $query);
        $datas = array();
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $datas[] = $row;
            }
        }

        foreach ($datas as $data) {

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
            <div class="card" style="min-width: 300px; max-width: 350px; margin-bottom: 30px">
            <img class="card-img-top" src="assets/download.png" alt="Card image cap"
                 style="width: 100px; margin-left: 35%; margin-top: 20px">
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $data['name']; ?></h5>
                <p class="card-text text-secondary text-center "><?php echo $entireHouse . ", " . $gym . ", " . $pool ?></p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item text-center">
                    <?php echo $data['address'] . ", " . $data['state'] . ", " . $data['country']?>
                </li>
                <li class="list-group-item text-center">Rooms: <?php echo $data['bedrooms']; ?> </li>
                <li class="list-group-item text-center ">Washrooms: <?php echo $data['washrooms']; ?></li>
                <li class="list-group-item text-center ">For: <?php echo $data['guests']; ?> People</li>
                <li class="list-group-item text-center">Rent: <?php echo $data['price']; ?> / Night</li>
            </ul>
            <div class="card-body">
                <a href="modifyListing.php?id=<?php echo $data['id'] ?>&name=<?php echo $data['name'] ?>"
                class="card-link">
                <Button class="btn btn-primary" style="background-color: #7abaff; min-width: 45%; border: 0px"> UPDATE
                </Button>
                </a>
                <a href="Operations/delete.php?id=<?php echo $data['id'] ?>&name=<?php echo $data['name'] ?>"
                <Button style="min-width: 45%; background-color: #7abaff; border: 0px" class="btn btn-primary"> DELETE
                </Button>
                </a>

            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
