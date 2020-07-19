<?php

include "assets/header.php";
include "assets/database.php";
$job_id=(int) $_GET['job_id'];
$query ="SELECT * FROM jobs where assigned_to='".$_SESSION['userid']."' and job_id=$job_id";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$today=date('Y-m-d');
$message='';
$company_name='';
foreach($result as $row){
    $problem =$row['description'];
    $assigned_by=$row['assigned_by'];
    $query ="SELECT * FROM clients where client_id='".$row['client_id']."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    $result2 = $statement->fetchAll();

    foreach($result2 as $row2){
        $message=" Work Report For ".$row2['name'];
        $company_name=$row2['name'];
    }
}

if(isset($_POST['add_work_report'])){
    $consultant_name=$_SESSION['fullname'];
    $start_date=$today;
    $error_tools=$_POST['error_tools_required'];
    $error_on_ground=$_POST['error_on_ground'];
    $solution=$_POST['solution'];
    $customer_comment=$_POST['customer_comment'];
    $recommendations=$_POST['recommendations'];
    $due_dates=$_POST['due_dates'];
    $job_card_no=$job_id;
    $time_spent=$_POST['time_spent'];
    $hours_days=$_POST['hours_days'];
    $amount=$_POST['amount'];
    $follow_ups=$_POST['follow_ups'];

    //inserting user info
    $query="INSERT INTO work_report(consultant_name, date, job_id, assigned_by, customer_name, customer_problem, error_tools_required, error_on_ground, solution, customer_comment, recommendations, due_dates, job_card_no, time_spent, hours_days, amount, follow_ups)
    VALUES(
        '$consultant_name',
        '$start_date',
        '$job_id',
        '$assigned_by',
        '$company_name',
        '$problem',
        '$error_tools',
        '$error_on_ground',
        '$solution',
        '$customer_comment',
        '$recommendations',
        '$due_dates',
        '$job_card_no',
        '$time_spent',
        '$hours_days',
        '$amount',
        '$follow_ups'
        )";
    $statement = $connect->prepare($query);
    $statement->execute();


    $query ="UPDATE jobs SET status='finished' where job_id=$job_id";
    $statement = $connect->prepare($query);
    $statement->execute();
    $message="Work Request Added !";

}
?>
            <div id="page-wrapper">
                <div class="graphs">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item"><i class="fa fa-tasks"></i> Jobs</li>
                            <li class="breadcrumb-item"><i class="fa fa-tasks"></i><a href="assigned_jobs.php"> My Assigned Jobs</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href=""><i
                                        class="fa fa-pencil"></i> Add Work Report</a></li>
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
                                                class="form-control" value="<?php echo $_SESSION['fullname']; ?>"disabled>
                                        </div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Date :</b> </p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="date" name="start_date" id="" 
                                                class="form-control" value="<?php echo $today; ?>" disabled>
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
                                                class="form-control" value="<?php echo $company_name; ?>"disabled>
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
                                            <textarea name="error_tools_required" id="" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Error Realised On The Ground :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="error_on_ground" id="" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Error Number and Solution :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="solution" id="" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Customer Comment:</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="customer_comment" id="" cols="30" rows="5" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Recommendations:</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="recommendations" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Due Dates if job pending and reasons :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="due_dates" id="" cols="30" rows="5" class="form-control"></textarea>
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
                                        <div class="col-md-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="time_spent"
                                                    id="inlineRadio1" value="hours" required>
                                                <label class="form-check-label" for="inlineRadio1">Hours</label>
                                                <input class="form-check-input" type="radio" name="time_spent"
                                                    id="inlineRadio2" value="days" required>
                                                <label class="form-check-label" for="inlineRadio2">Days</label>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <input type="number" name="hours_days" id="" 
                                                class="form-control" >
                                        </div>
                                        <div class="col-md-1">
                                            <p id="txt"><b>Amount :</b> </p>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="number" name="amount" id="" 
                                                class="form-control" >
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="row ">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-2">
                                            <p id="txt"><b>Follow Ups :</b> </p>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea name="follow_ups" id="" cols="30" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-6"><input type="submit" name="add_work_report" id="" class="btn btn-primary" value="Add Work Report"></div>
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