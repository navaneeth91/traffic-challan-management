<?php
session_start();
if (!isset($_SESSION['pid'])) {
    header('location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>Challan page</title>
    <link rel="icon" href="img/policelogo.png" type="image/png">
    <link rel="shortcut icon" href="img/policelogo.png" type="img/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
    <link href="css/magnific-popup.css" rel="stylesheet" type="text/css">
    <link href="css/animate.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="js/jquery.1.8.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
    <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/wow.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.chreport').click(function() {
                var pdate = $('#pdate').val();
                $.ajax({
                    url: '<?= $_SERVER['PHP_SELF'] ?>',
                    type: 'POST',
                    data: {pdate: pdate},
                    dataType: 'json',
                    success: function(data) {
                        var html = '';
                        if (data.length > 0) {
                            $.each(data, function(index, record) {
                                html += '<div class="row">';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.violetor_name + '</h3></div>';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.address + '</h3></div>';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.vehical_name + '</h3></div>';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.vehical_no + '</h3></div>';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.challan_cost + '</h3></div>';
                                html += '<div class="col-md-2"><h3 class="text-center text-white">' + record.date + '</h3></div>';
                                html += '</div>';
                            });
                        } else {
                            html = '<div class="row"><div class="col-md-12"><h3 class="text-center text-white">No records found</h3></div></div>';
                        }
                        $('#pdtresult').html(html);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <header class="header" id="header">
        <div class="container">
            <figure class="logo animated fadeInDown delay-07s">
                <a href="#"><img src="img/policelogo.png" alt=""></a>
            </figure>
            <h2 style="color: white;"><b>TELANGANA POLICE</b></h2>
            <div id="challanreport" class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="text-center">Enter Challan date</h3>
                            </div>
                            <div class="card-body bg-info">
                                <form>
                                    <div class="form-group">
                                        <h3 class="form-input form-control">Date: <input type="date" class="form-input" id="pdate"/> </h3>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer bg-dark">
                                <div class="btn btn-danger chreport">Submit</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="container mt-5" id="chreport">
                    <div class="card">
                        <h2 class="text-center">Violetor Details</h2>
                        <div class="card-header bg-info">
                            <div class="row">
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Violetor Name</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Address</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Vehical Name</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Vehical No</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Challan Cost</h3>
                                </div>
                                <div class="col-md-2">
                                    <h3 class="text-center text-white">Date</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body bg-dark">
                            <div id="pdtresult"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php
    // Backend PHP to handle AJAX request
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pdate'])) {
        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "traffic"; // Change this to your actual database name

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $pdate = $_POST['pdate'];

        $sql = "SELECT u_info.name AS violetor_name, u_info.adds AS address, vehicle_detail.vehicle_name AS vehical_name, vehicle_detail.vehicle_no AS vehical_no, vehicle_detail.challan_cost, u_info.challandate AS date 
                FROM u_info 
                INNER JOIN vehicle_detail ON u_info.uid = vehicle_detail.uid 
                WHERE u_info.challandate = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $pdate);
        $stmt->execute();
        $result = $stmt->get_result();

        $records = [];
        while ($row = $result->fetch_assoc()) {
            $records[] = $row;
        }

        $stmt->close();
        $conn->close();

        echo json_encode($records);
        exit();
    }
    ?>
</body>
</html>
