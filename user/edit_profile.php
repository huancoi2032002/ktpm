<?php session_start(); ?>
<?php include "../model/header.php"; ?>
<div class="container rounded bg-white mt-5 mb-5"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<?php
include('../admin/connect.php');
    
$customer_id = $_SESSION['customer_id'];
$sql = "SELECT * from customer where $customer_id ";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_array($result);
?>
<?php
    ?>
   <form action="xuly.php" method="post">
   <div class="row">
        <div class="col-md-2 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></span><span class="text-black-50"><?php echo $data['customer_name'];echo '<br>';echo $data['email'] ?></span><span> </span></div>
        </div>
        <div class="col-md-10 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-2">
                   
                     <div class="col-md-6"><label class="labels">ID</label><input type="text" name="id" class="form-control" value="<?php echo $customer_id;?>"></div>
                    <div class="col-md-6"><label class="labels">Name</label><input type="text"name="name"  class="form-control" value="<?php echo $data['customer_name'];?>"></div>
                    <div class="col-md-6"><label class="labels">Username</label><input type="text"name="username" class="form-control" value="<?php echo $data['account_name'];?>" ></div>
                    <div class="col-md-6"><label class="labels">Password</label><input type="text"name="password" class="form-control"  value="<?php echo $data['password'];?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"name="phone" class="form-control"  value="<?php echo $data['phone_number'];?>"></div>
                    <div class="col-md-12"><label class="labels">Address </label><input type="text"name="address" class="form-control"  value="<?php echo $data['address'];?>"></div>
                    <div class="col-md-12"><label cla   ss="labels">Email </label><input type="text"name="Email" class="form-control"  value="<?php echo $data['email'];?>"></div>
                </div>
                   
        
                 <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
            </div>
        </div>
    </div>
</div>
<?php include "../model/footer.php"; ?>

