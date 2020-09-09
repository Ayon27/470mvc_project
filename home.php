<?php include_once 'Resource/guestHeader.php';
include_once 'Resource/connection.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.min.css"/>
</head>

<body>
<div>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-clean" style="background-color: white">
                    <form method="get" action="search.php?">
                        <h2 class="text-center">Find a place to stay</h2>
                        <p class="text-center text-danger" name="error"></p>
                        <div class="form-group"><input required class="form-control" type="text" name="key"
                                                       placeholder="Search For a Place" style="color: black" value="">
                        </div>
                        <div class="form-group"><input pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))"
                                                       required class="form-control" type="text" id="cinDate"
                                                       autocomplete="off"
                                                       name="cinDate" placeholder="Check-in Date"></div>
                        <div class="form-group"><input required
                                                       pattern="([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))"
                                                       class="form-control" type="text" id="coutDate"
                                                       autocomplete="off"
                                                       name="coutDate" placeholder="Check-out Date"></div>
                        <div class="form-group"><input required class="form-control" type="number" name="guestCount"
                                                       placeholder="Number of Guests" min="1"></div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Search" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <h2 class="text-center" style="margin-top: 100px; margin-bottom: 50px"><strong>Featured places</strong>
                </h2>
                <div class="card-deck">
                    <?php
                    $query = "SELECT * from listing ORDER BY RAND() LIMIT 6";
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
                                    <?php echo $data['address'] . ", " . $data['state'] . ", " . $data['country'] ?>
                                </li>
                                <li class="list-group-item text-center">Rooms: <?php echo $data['bedrooms']; ?> </li>
                                <li class="list-group-item text-center ">
                                    Washrooms: <?php echo $data['washrooms']; ?></li>
                                <li class="list-group-item text-center ">For: <?php echo $data['guests']; ?> People</li>
                            </ul>
                            <div class="card-body">
                                <a href="confirmBooking.php?placeID=<?php echo $data['id']; ?>"
                                <Button class="btn btn-primary"
                                        style="min-width: 100%; background-color: #7abaff; border: none"><?php echo $data['price'] ?>
                                    /
                                    Night
                                </Button>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    $("#cinDate").datepicker({
        autoClose: true,
        dateFormat: 'yy-mm-dd',
        minDate: new Date(),
        onSelect: function (dateText, inst) {
            var min = $.datepicker.parseDate(inst.settings.dateFormat, dateText);
            min.setDate(min.getDate() + 1);
            $('#coutDate').datepicker('setDate', min);
            $('#coutDate').datepicker('option', 'minDate', min);
        }
    });

    $('#coutDate').datepicker({
        minDate: '+1d',
        dateFormat: 'yy-mm-dd',
        autoClose: true,
    });
</script>

