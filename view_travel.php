<?php

include "assets/header.php";
include "assets/database.php";
$id=$_GET['id'];
$message="View travel Request";
$query ="SELECT * FROM travel_request WHERE travel_id='$id'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $travel_type=$row['travel_type'];
    $travel_reason=$row['travel_reason'];
    $depature_place=$row['depature_place'];
    $destination=$row['destination'];
    $advance=$row['advance'];
    $advance_amount=$row['advance_amount'];
    $travel_date=$row['travel_date'];
    $return_date=$row['return_date'];
    $status=$row['status'];
    $assigned_to=$row['assigned_to'];
    $approver=$row['approver'];
    $approval_date=$row['approval_date'];

    $query ="SELECT * FROM user_info WHERE userid='".$row['userid']."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result2 = $statement->fetchAll();

    foreach($result2 as $row2){
        $fname=$row2['firstname'];
        $lname=$row2['lastname'];
    }

    $query ="SELECT * FROM user_info WHERE userid='$assigned_to'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result3 = $statement->fetchAll();

    foreach($result3 as $row3){
        $fullname=$row3['firstname'] . " ". $row3['lastname'];
    }

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
                                            <?php if($travel_type == 'local') : ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="travel_type"
                                                        id="inlineRadio1" value="local" disabled checked>
                                                    <label class="form-check-label" for="inlineRadio1">Local</label>
                                                    <input class="form-check-input" type="radio" name="travel_type"
                                                        id="inlineRadio2" value="international" disabled>
                                                    <label class="form-check-label" for="inlineRadio2">International</label>
                                                </div>
                                            <?php else: ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="travel_type"
                                                        id="inlineRadio1" value="local" disabled>
                                                    <label class="form-check-label" for="inlineRadio1">Local</label>
                                                    <input class="form-check-input" type="radio" name="travel_type"
                                                        id="inlineRadio2" value="international" disabled checked>
                                                    <label class="form-check-label" for="inlineRadio2">International</label>
                                                </div>
                                            <?php  endif ; ?>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Reasons For Travel :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="travel_reason" id="" class="form-control" placeholder="Reasons For Travel" value="<?php echo $travel_reason; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Travel Date and Time:</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="travel_date" id="" class="form-control" value="<?php echo $travel_date; ?>" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Return Date and Time:</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="return_date" id="" class="form-control" value="<?php echo $return_date; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Place of Depature :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="depature_place" id="" class="form-control" placeholder="Place of Depature" value="<?php echo $depature_place; ?>" disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Destination/Stop Over :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="destination" id="" class="form-control" placeholder="Destination/Stop Over" value="<?php echo $destination; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Advance Requested:</b> </p>
                                        </div>
                                        <div class="col-md-6">
                                            <?php if($travel_type == 'local') : ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="advance_requested"
                                                    id="inlineRadio1" value="yes" checked disabled>
                                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                <input class="form-check-input" type="radio" name="advance_requested"
                                                    id="inlineRadio2" value="no" disabled>
                                                <label class="form-check-label" for="inlineRadio2">No</label>
                                            </div>
                                            <?php else: ?>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="advance_requested"
                                                        id="inlineRadio1" value="yes" disabled>
                                                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                                                    <input class="form-check-input" type="radio" name="advance_requested"
                                                        id="inlineRadio2" value="no" checked disabled>
                                                    <label class="form-check-label" for="inlineRadio2">No</label>
                                                </div>
                                            <?php  endif ; ?>                
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Amount Requested :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="number" name="advance_amount" id="" class="form-control" value="<?php echo $advance_amount; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8"><div class="alert alert-info" style="width:100%"><h4 align="center">Approvals</h4></div></div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Status :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="firstname" id="" value="<?php echo $status; ?>"
                                                class="form-control" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Approved/Rejected By :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="depature_place" id="" class="form-control" placeholder="Place of Depature" value="<?php echo $fullname; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Position :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="depature_place" id="" class="form-control" placeholder="Place of Depature" value="Consultant Manager" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Approval/Reject Date :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="depature_place" id="" class="form-control" placeholder="Place of Depature" value="<?php echo $approval_date; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
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