<?php

include "assets/header.php";
include "assets/database.php";
$userid=$_GET['id'];
$query ="SELECT * FROM user_info where userid='$userid'";
$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

foreach($result as $row){
    $fullname=$row['firstname']. " ".$row['lastname'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $gender=$row['gender'];
    $position=$row['position'];
    $email=$row['email'];
    $phone=$row['phone'];
    $address=$row['address'];
}
?>
            <div id="page-wrapper">
                <div class="graphs">
                    <div class="md">
                        <div class="row container ">
                            <div class="col-md-1"></div>
                            <div class="col-md-11">
                                <div class="panel-group">
                                    <div class="panel panel-primary">
                                        <div class="panel-body">
                                            <h2 id="txt-name" class="name"><?php echo $fullname; ?></h2>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-1">
                                                    <a href="edit_user.php?id=<?php echo $_SESSION['userid']; ?>">EDIT</a>
                                                </div>
                                                <?php if($_SESSION['role']=='admin') :?>
                                                    <div class="col-md-1">
                                                        <a href="delete_user.php?id=<?php echo $userid; ?>">DELETE</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="deactivate_user.php?id=<?php echo $userid; ?>">DEACTIVATE/ACTIVATE USER</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="change_password.php?id=<?php echo $userid; ?>">CHANGE PASSWORD</a>
                                                    </div>
                                                <?php endif ; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-primary">
                                        <div class="panel-body">

                                            <div class="row ">
                                                <div class="col-md-3">
                                                    <br><br>
                                                <span class="fa fa-user" style="font-size:250px;"> </span>
                                                    <br><br>

                                                </div>
                                                <div class="col-md-9 jumbotron">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <h4>Basic Information</h4>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p id="txt"><b>Firstname : </b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p id="detail"><i><?php echo $firstname; ?></i></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p id="txt"><b>Lastname : </b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p id="detail"><i><?php echo $lastname; ?></i></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p id="txt"><b>Gender : </b></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <p id="detail"><i><?php echo $gender; ?></i></p>
                                                                    </div>
                                                                </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p id="txt"><b>Position : </b></p>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p id="detail"><i><?php echo $position; ?></i></p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                    <div class="col-md-6">
                                                                        <p id="txt"><b>Role : </b></p>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                    <?php
                                                                            $query ="SELECT * FROM login_details where userid='$userid'";
                                                                            $statement = $connect->prepare($query);
                                                                            $statement->execute();
                                                                            $result2 = $statement->fetchAll();

                                                                            foreach($result2 as $row){
                                                                                $role=$row['role'];
                                                                            }


                                                                    ?>
                                                                        <p id="detail"><i><?php echo $role; ?></i></p>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                                <h4>Address & Contact Details</h4>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <p id="txt"><b>Email: </b></p>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p id="detail"><i><?php echo $email; ?></i></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <p id="txt"><b>Phone: </b></p>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p id="detail"><i><?php echo $phone; ?></i></p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <p id="txt"><b>Address: </b></p>
                                                                    </div>
                                                                    <div class="col-md-9">
                                                                        <p id="detail"><i><?php echo $address; ?></i></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
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