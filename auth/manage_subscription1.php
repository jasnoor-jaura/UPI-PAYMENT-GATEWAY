<?php include "header.php"; ?>

<?php 
$query = $conn->query("SELECT * FROM `subscription_plan`");

if($userdata["role"] != 'Admin'){
   echo '<script>
 window.location.href = "dashboard";
</script>';

    exit;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updatesub"])) {
// Capture the POST data
$srno = $_POST['srno'];
$planname = $_POST['plan_name'];
$amount = $_POST['amount'];
$expiry = $_POST['expiry'];


// Prepare the update statement
$update_query = "UPDATE subscription_plan SET plan_name = ?, amount = ?, expiry = ? WHERE id = ?";
$update_stmt = $conn->prepare($update_query);
$update_stmt->bind_param("sssi", $planname, $amount, $expiry, $srno);

if ($update_stmt->execute()) {
    
// Success message
echo "<script>
Swal.fire({
title: 'Success!',
text: 'Subscription updated successfully!',
icon: 'success',
confirmButtonText: 'OK'
}).then(() => {
    window.location.href = 'manage_subscription';
});
  </script>";
  
} else {
// Error during update
echo "<script>
Swal.fire({
title: 'Error!',
text: 'Error updating Subscription',
icon: 'error',
confirmButtonText: 'OK'
}).then(() => {
    window.location.href = 'manage_subscription';
});
  </script>";
}

$update_stmt->close(); // Close the update statement

}

?>


            <!-- START PAGE CONTENT-->
            <div class="page-heading">
                <h1 class="page-title">Update Subscription & Plans</h1>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index"><i class="la la-home font-20"></i></a>
                    </li>
                    <!-- <li class="breadcrumb-item">Icons</li> -->
                </ol>
            </div>
            <div class="page-content fade-in-up">
                <div class="ibox">
                    <div class="ibox-body">
                        <!-- <div class="row"> -->
                            <!-- <div class="col-md-4"> -->
                                <div class="card m-t-20 m-b-20">
                                    <div class="card-body">
                                    <div class="main-panel">

                                    <div class="main-panel">
				<div class="content">
				    <?php 
				    if(isset($_GET["srno"]) && $_GET["srno"] != ''){
				    
				    $fetchdata = $conn->query("SELECT * FROM `subscription_plan` WHERE id = '{$_GET["srno"]}'")->fetch_assoc();
				    
				    ?>
							<div class="row p-4">
							 <form method="POST" action="">
                            <input type="hidden" name="srno" value="<?php echo htmlspecialchars($fetchdata["id"]); ?>" class="form-control" required>
                            <div class="row">
                            <div class="col-md-6 mb-3">
                            <label>Plan Name</label>
                            <input type="text" name="plan_name" value="<?php echo htmlspecialchars($fetchdata["plan_name"]); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label>Amount</label>
                            <input type="text" name="amount" value="<?php echo htmlspecialchars($fetchdata["amount"]); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-6 mb-3">
                            <label>Expiry Date</label>
                            <input type="text" name="expiry" value="<?php echo htmlspecialchars($fetchdata["expiry"]); ?>" class="form-control" required>
                            </div>
                            <div class="col-md-12 mb-3">
                            <button type="submit" name="updatesub" class="btn btn-primary">Save Changes</button>
                            </div>
                            </div>
                            </form>   							
							</div>							
				    
				    <?php }else{ ?>
							<div class="row">							
							<?php while($row = $query->fetch_assoc()){ ?>				
							<div class="col-md-3">
								<div class="card text-center">
									<div class="card-header">
										<h4 class="card-title"><?= $row["plan_name"] ?></h4>
										<h2 class="text-center">₹<?= number_format($row["amount"]) ?></h2>
										<p class="card-category"><?= $row["expiry"] ?> Month</p>
									</div>
									<div class="card-body">
										
											<table class="mx-auto">
										<tbody>
										  <tr>
                                                <td><i class="icon-md text-primary me-2" data-feather="check"></i></td>
                                                <td><p>0 Transaction Fee</p></td>
                                            </tr>
                                            <tr>
                                                <td><i class="icon-md text-primary me-2" data-feather="check"></i></td>
                                                <td><p>Realtime Transaction</p></td>
                                            </tr>
                                            <tr>
                                               <td><i class="icon-md text-primary me-2" data-feather="check"></i></td>
                                                <td><p>No Amount Limit</p></td>
                                            </tr>
                                            <tr>
                                                <td><i class="icon-md text-primary me-2" data-feather="check"></i></td>
                                                <td><p style="color:red;">HDFC Vyapar</p></td>
                                            
                                            </tr>                                              
                                            <tr>
                                                <td><i class="icon-md text-danger me-2" data-feather="x"></i></td>
                                                <td><p>Dynamic QR Code</p></td>
                                            </tr>
                                                                                      
                                            <tr>
                                                <td><i class="icon-md text-danger me-2" data-feather="x"></i></td>
                                                <td><p>Direct UPI Intent</p></td>
                                            </tr>
                                            <tr>
                                                <td><i class="icon-md text-danger me-2" data-feather="x"></i></td>
                                                <td><p>Accept All UPI Apps</p></td>
                                            </tr>
                                            <tr>
                                                <td><i class="icon-md text-primary me-2" data-feather="check"></i></td>
                                                <td><p>24*7 WhatsApp Support</p></td>
                                            </tr>
										</tbody>
										</table>
									</div>
									<div class="card-footer">
									<button onclick="window.location.href = 'manage_subscription?srno=<?= $row["id"] ?>'" class="btn btn-success btn-block updatesubbtn">Edit</button>
									</div>
								</div>
							</div>			
						
							<?php } ?>
							</div>
							<?php } ?>
							
	


</div>
</div>
</body>
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
<script src="assets/js/rechpay.js?1697835127"></script>
 <script src="assets/js/app.min.js" type="text/javascript"></script>
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script type="text/javascript">
function utr_search(utr_number){
if(getCurentFileName()=="transactions"){	
if(utr_number.length==12){
search_txn('2023-10-01','2023-10-21','',utr_number);
}else{
Swal.fire('Enter Valid UTR Number!');	
}
}else{
location.href ='transactions';
}
}
</script>
</html>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"/>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
$(document).ready(function () {
    $("#dataTable").DataTable();
});
</script>
<script src="assets/js/bharatpe.js?1697835127"></script>