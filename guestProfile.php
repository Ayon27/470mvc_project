<?php
include_once 'Resource/guestHeader.php';
include_once 'Resource/connection.php';
?>
<html>
<head>
    <title>Profile</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
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
<body style="background-color: #EEF4F7;">


<div class="team-boxed" style="background-color: #EEF4F7; ">
    <?php
    $userID = $_SESSION['id'];
    $query = "SELECT * FROM guest WHERE id = $userID;";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $datas[] = $row;
        }
    }
    foreach ($datas

    as $data) {


    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 item"
                 style="background-color: white; margin-top: 70px; border: 1px solid white;
                 border-radius: 5px; box-shadow: 0 0 2px #9f9f9f; max-height: 510px">
                <div class="box" style="margin-top: 15px"><img class="rounded-circle" src="assets/cnh.png"
                                                               style="width: 200px; margin-left: 20%;
                                                               margin-top: 10px; margin-bottom: 15px">
                    <h3 class="name" style="text-align: center"><?php echo $data['name']; ?>
                    </h3>
                    <p class="title" style="text-align: center"><?php echo $data['email']; ?>
                    </p>
                    <div>
                        <p class="title" style=" text-align: center"><i style="margin-right: 10px; font-size: 20px;"
                                                                        class="material-icons">local_phone</i><?php echo $data['phone']; ?>
                        </p>
                    </div>
                    <p class="description" style="text-align: center"><i class="material-icons">location_on</i>
                        <?php echo $data['address'] . ", " . $data['state'] . "," . $data['country']; ?>
                    </p>
                    <?php
                    }
                    ?>

                </div>
                <p align="center">
                    <button type="button" class="btn btn-success" style="background-color: #7abaff; border: none"
                            data-toggle="modal" data-target="#myModal">Update Profile
                    </button>

                </p>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 item"></div>
            <div class="col-md-6 col-lg-4 item"
                 style="margin-top: 60px; max-height:100vh; overflow-y: auto;">
                <h4 class="text-secondary text-center">Your Booking History Will Appear Here</h4>
                <?php
                $query = "SELECT booking.listing_id, booking.booking_id, booking.check_in,
                            booking.check_out, listing.name,
                            listing.hostName, listing.address, listing.state, listing.country
                            from listing 
                            INNER JOIN booking on booking.listing_id = listing.id
                            WHERE booking.user_id = $userID;";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $historyDatas[] = $row;
                    }
                    foreach ($historyDatas

                             as $historyData) {


                        ?>
                        <a href="confirmBooking.php?placeID=<?php echo $historyData['listing_id'] ?>"
                           style="text-decoration: none; color: black;">
                            <div class="card" style="margin-bottom: 30px; margin-top: 15px; max-height: 300px;">
                                <div class="card-body">
                                    <h6 class="text-secondary text-center" style="font-size: 14px">Booking#
                                        <?php echo $historyData['booking_id']; ?>
                                    </h6>
                                    <h4 class="card-title text-center"><?php echo $historyData['name']; ?>
                                    </h4>
                                    <h6 class="text-muted card-subtitle mb-2 text-center">
                                        <?php echo $historyData['address'] . ", " . $historyData['state'] . "," . $historyData['country']; ?>
                                        <p>Host: <?php echo $historyData['hostName']; ?>
                                        </p>
                                    </h6>
                                    <p class="card-text text-center" style="margin-top: 30px">
                                        Check-in: <?php echo $historyData['check_in']; ?>
                                    </p>
                                    <p class="card-text text-center"> Check-out:
                                        <?php echo $historyData['check_out']; ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                }
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <?php
    foreach ($datas

             as $data) {
        ?>
        <div class="modal-dialog modal-lg" id="updateModal">

            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Profile</h4>
                    <button type="button" id="closeIcon" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <form id="profileUpdateForm" method="post" action="Operations/updateProfile.php">
                        <input hidden type="text" name="for" value="guest" id="">
                        <div class="form-group">
                            <label>Full Name: </label>
                            <input required type="text" name="name" class="form-control"
                                   pattern="^(?! )[A-Za-z ]*(?<! )$"
                                   value="<?php echo $data['name']; ?>" maxlength="40">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail4"
                                       placeholder="Email"
                                       value="<?php echo $data['email']; ?>" maxlength="80">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Phone: </label>
                                <input required pattern="^(?! )[0-9]*(?<! )$" type="text" name="phone"
                                       class="form-control"
                                       id="phone"
                                       value="<?php echo $data['phone']; ?>" maxlength="20">
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Street Address: </label>
                                <input type="text" name="address" class="form-control"
                                       value="<?php echo $data['address']; ?>" maxlength="95">
                            </div>

                            <div class="form-group col-md-4">
                                <label>State: </label>
                                <input type="text" name="state" class="form-control"
                                       value="<?php echo $data['state']; ?>"
                                       maxlength="15">
                            </div>

                            <div class="form-group col-md-4">
                                <label>Country: </label>
                                <input type="text" name="country" class="form-control"
                                       value="<?php echo $data['country']; ?>" maxlength="15">
                            </div>
                        </div>
                        <p class="text-center">
                            <button class="btn btn-primary" id="save" type="submit"
                                    style="background-color: #7abaff; min-width: 100px; border: none">Save
                            </button>
                        </p>
                    </form>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" id="enableEdit"
                            style="border: .5px solid grey; min-width: 100px"> Edit
                    </button>
                    <button type="button" id="close" class="btn btn-default"
                            style="border: .5px solid grey; min-width: 100px" data-dismiss="modal">Close
                    </button>
                </div>
            </div>

        </div>

    <?php } ?>
</div>
</body>
</html>


<script>
    $(document).ready(function () {
        $("#profileUpdateForm :input").prop("disabled", true);
        $("#enableEdit").click(function () {
            $("#profileUpdateForm :input").prop("disabled", false);
        });
    });
    $('html').click(function () {
        $("#profileUpdateForm :input").prop("disabled", true);
        $("#enableEdit").click(function () {
            event.stopPropagation();
        });
        $("#updateModal").click(function (e) {
            if ((e.target.id == "close") || (e.target.id == "closeIcon"))
                return;
            event.stopPropagation();
        });

    });
</script>