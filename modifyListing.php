<?php
$placeName = $_GET['name'];
$placeID = $_GET['id'];

if(empty($placeName) || empty($placeID)) {
header('location: hosthome.php');
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Modify My Listings</title>
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
<?php include_once 'Resource/header.php';
include_once 'Resource/connection.php';
?>

<div>
    <div class="container">
        <h2 class="text-center" style="margin-top: 30px; margin-bottom: 20px">Update Information of
            <strong><?php echo $placeName ?>
            </strong>
        </h2>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php
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
                ?>
                <form method="POST" action="Operations/update.php">
                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            <input type="hidden" name="id" value="<?php echo $placeID ?>">
                            Change Name:
                        </label><input required name="name" class="form-control" placeholder="" type="text"
                                       pattern="[A-Za-z\s]+" value="<?php echo $data['name']; ?>">
                    </div>

                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            Number of Bedrooms:
                        </label><input required name="bedroom" class="form-control" placeholder="" type="number"
                                       min="1" value="<?php echo $data['bedrooms']; ?>">
                    </div>

                    <div class=" form-group">
                        <label style="margin-top: 20px;">
                            Number of washrooms:
                        </label>
                        <input required name="washroom" class="form-control" placeholder="" type="number" min="1"
                               value="<?php echo $data['washrooms']; ?>">
                    </div>

                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            How many guests can stay?
                        </label>
                        <input required name="guests" class="form-control" type="number" min="1"
                               value="<?php echo $data['guests']; ?>">
                    </div>

                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            Is the entire place for guests?
                        </label>
                        <select name="entirePlace" required class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No, just a part of it</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            Street Address:
                        </label>
                        <input required name="address" class="form-control" type="text"
                               value="<?php echo $data['address']; ?>">
                    </div>

                    <div class="form-group">
                        <label style="margin-top: 20px;">
                            Price for one night stay:
                        </label>
                        <input required name="price" class="form-control" type="number" step="0.01" min="0"
                               value="<?php echo $data['price']; ?>">
                    </div>
            </div>
        </div>
        <div class="form-group">
            <div class="btn-group" role="group"></div>
            <input name="submit" class="btn btn-primary" type="submit"
                   style="margin-top: 20px; min-width: 120px;min-height: 40px; margin-left: 45%; margin-top: 30px; margin-bottom: 50px;">
        </div>
        </form>
    </div>
    <?php
    }
    mysqli_close($conn);
    ?>
    <div class="col-md-4">
    </div>
</div>
</body>
</html>