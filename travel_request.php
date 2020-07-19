<?php

include "assets/header.php";
include "assets/database.php";
$query ="SELECT * FROM user_info WHERE userid='".$_SESSION['userid']."'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $fname=$row['firstname'];
    $lname=$row['lastname'];
}
$message='Create Travel Request';
if(isset($_POST['create_travel'])){
    $travel_type=$_POST['travel_type'];
    $travel_reason=$_POST['travel_reason'];
    $depature_place=$_POST['depature_place'];
    $destination=$_POST['destination'];
    $advance_requested=$_POST['advance_requested'];
    $advance_amount=$_POST['advance_amount'];
    $travel_date=$_POST['travel_date'];
    $return_date=$_POST['return_date'];


    //assigning consultancy manager
    $query ="SELECT * FROM user_info WHERE position='consultancy manager'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    foreach($result as $row){
        $assigned_to=$row['userid'];
    }

    //inserting user info
    $query="INSERT INTO travel_request
             (userid,travel_type,travel_reason,depature_place,destination,advance,advance_amount,travel_date,return_date,status,assigned_to)
    VALUES('".$_SESSION['userid']."','$travel_type','$travel_reason','$depature_place','$destination','$advance_requested','$advance_amount','$travel_date','$return_date','Consultancy Manager Approval','$assigned_to')";
    $statement = $connect->prepare($query);
    $statement->execute();

    $message="Travel Creation Successful Please Wait for Your Consultancy Manager Approval !";

}
?>
            <div id="page-wrapper">
                <div class="graphs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><i class="lnr lnr-bus"></i> Travel Request</li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="travel_request.php"><i
                                        class="fa fa-pencil"></i> Create New Travel Request</a></li>
                        </ol>
                    </nav>
                    <div class="container">
                        <div class="panel-group">
                            <div class="panel panel-primary">
                                <br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8"><div class="alert alert-success" style="width:100%"><h4 align="center"><?php echo $message; ?></h4></div></div>
                            </div>
                                <br>
                                <form action="" method="post">
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Firstname :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="firstname" id="" value="<?php echo $fname; ?>"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Lastname :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="firstname" id="" value="<?php echo $lname; ?>"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Type of Travel:</b> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="travel_type"
                                                    id="inlineRadio1" value="local" required>
                                                <label class="form-check-label" for="inlineRadio1">Local</label>
                                                <input class="form-check-input" type="radio" name="travel_type"
                                                    id="inlineRadio2" value="international">
                                                <label class="form-check-label" for="inlineRadio2" required>International</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Reasons For Travel :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="travel_reason" id="" class="form-control" placeholder="Reasons For Travel" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Travel Date and Time:</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="datetime-local" name="travel_date" id="" class="form-control" required>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Return Date and Time:</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="datetime-local" name="return_date" id="" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Place of Depature :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="depature_place" id="" class="form-control" placeholder="Place of Depature" required>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Destination/Stop Over :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="destination" id="" class="form-control" placeholder="Destination/Stop Over" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Advance Requested:</b> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="advance_requested"
                                                    id="inlineRadio1" value="yes" required>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                <input class="form-check-input" type="radio" name="advance_requested"
                                                    id="inlineRadio2" value="no" required>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Amount Requested :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="advance_amount" id="" class="form-control">
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-6"><input type="submit" name="create_travel" id="" class="btn btn-primary" value="Create Travel Request"></div>
                                    </div>
                                </form>

                                <br>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.nicescroll.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>