<?php

include "assets/header.php";
include "assets/database.php";
$job_id=(int) $_GET['job_id'];
$query ="SELECT * FROM work_report where job_id=$job_id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();


foreach($result as $row){
    $problem =$row['customer_problem'];
    $assigned_by=$row['assigned_by'];
    $customer_name=$row['customer_name'];
    $consultant_name=$row['consultant_name'];
    $date=$row['date'];
    $customer_problem=$row['customer_problem'];
    $error_tools=$row['error_tools_required'];
    $error_on_ground=$row['error_on_ground'];
    $solution=$row['solution'];
    $customer_comment=$row['customer_comment'];
    $recommendations=$row['recommendations'];
    $due_dates=$row['due_dates'];
    $job_card_no=$row['job_card_no'];
    $time_spent=$row['time_spent'];
    $hours_days=$row['hours_days'];
    $amount=$row['amount'];
    $follow_ups=$row['follow_ups'];
    $message="Work Report for ".$customer_name;
}

?>
            <div id="page-wrapper">
                <div class="graphs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><i class="fa fa-tasks"></i> Jobs</li>
                            <li class="breadcrumb-item"><i class="fa fa-tasks"></i><a href="jobs.php"> Job History</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href=""><i
                                        class="fa fa-pencil"></i> View Work Report</a></li>
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
                                            <p id="txt"><b>Consultant Name :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="fullname" id="" 
                                                class="form-control" value="<?php echo $consultant_name; ?>"disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Date Started :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="start_date" id="" 
                                                class="form-control" value="<?php echo $date; ?>" disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Task Number(Job ID) :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="job_id" id="" 
                                                class="form-control" value="<?php echo $job_id; ?>"disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Task Assigned By :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" name="assigned_by" id="" 
                                                class="form-control" value="<?php echo $assigned_by; ?>"disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Customer Name :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="customer_name" id="" 
                                                class="form-control" value="<?php echo $customer_name; ?>"disabled>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Customer Problem :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="customer_problem" id="" cols="30" rows="5" class="form-control" disabled><?php echo $problem; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Error Diagnosis and Tools and equipments required:</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="error_tools_required" id="" cols="30" rows="5" class="form-control" disabled><?php echo $error_tools; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Error Realised On The Ground :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="error_on_ground" id="" cols="30" rows="5" class="form-control" disabled><?php echo $error_on_ground; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Error Number and Solution :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="solution" id="" cols="30" rows="5" class="form-control" disabled><?php echo $solution ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Customer Comment:</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="customer_comment" id="" cols="30" rows="5" class="form-control" disabled><?php echo $problem; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Recommendations:</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="recommendations" id="" cols="30" rows="5" class="form-control" disabled><?php echo $recommendations; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Due Dates if job pending and reasons :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="due_dates" id="" cols="30" rows="5" class="form-control" disabled><?php echo $due_dates; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Job Card No :</b> </p>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="job_card_no" id="" 
                                                class="form-control" value="<?php echo $job_id; ?>" disabled>
                                        </div>
                                        <div class="col-md-1">
                                        <input type="number" name="hours_days" id="" 
                                                class="form-control" value="<?php echo $hours_days; ?>" disabled>
                                        </div>
                                        <div class="col-md-2">
                                        <input type="text" name="time_spent" id="" 
                                                class="form-control" value="<?php echo $time_spent; ?>" disabled>
                                        </div>
                                        <div class="col-md-1">
                                            <p id="txt"><b>Amount :</b> </p>
                                        </div>
                                        <div class="col-md-2">
                                        <input type="number" name="amount" id="" 
                                                class="form-control" value="<?php echo $amount; ?>" disabled>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Follow Ups :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="follow_ups" id="" cols="30" rows="5" class="form-control" disabled><?php echo $follow_ups; ?></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
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