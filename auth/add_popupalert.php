<?php include "header.php"; ?>

    
<?php

//   ini_set("display_errors",true);
//   error_reporting(E_ALL);
 
  
  if (isset($_POST['create'])) {
      
      $title = $_POST["title"];
      $image = $_FILES["image"];
      $imgname = $image["name"];
      $imgtmpname = $image["tmp_name"];
      $path = 'assets/img/alertimg/'.$imgname;
      
      $addnotif = $conn->query("INSERT INTO `popup_alert`(`title`, `img`) VALUES ('$title','$path')");
      
      if($addnotif){
          move_uploaded_file($imgtmpname,$path);
          
         echo '<script src="js/jquery-3.2.1.min.js"></script>';
         echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Popup Alert Added Successfully.",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "add_popupalert";
                            }
                        });
                    </script>';
                    exit;
      }else{
          echo '<script src="js/jquery-3.2.1.min.js"></script>';
         echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "error",
                            title: "Error !",
                            text: "Failed to Add Alert !.",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                        });
                    </script>';
                    exit;
      }
  
  }
  
  if (isset($_POST['delete'])) {
      
      $id = $_POST["srno"];
      $deletenotif = $conn->query("DELETE FROM `popup_alert` WHERE id = '$id'");
      
      if($deletenotif){
          
         echo '<script src="js/jquery-3.2.1.min.js"></script>';
         echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: "Alert Deleted Successfully.",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "add_popupalert";
                            }
                        });
                    </script>';
                    exit;
      }else{
          echo '<script src="js/jquery-3.2.1.min.js"></script>';
         echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18"></script>';
        echo '<script>
        $("#loading_ajax").hide();
                        Swal.fire({
                            icon: "error",
                            title: "Error !",
                            text: "Failed to Delete Alert !.",
                            showConfirmButton: true,
                            confirmButtonText: "Ok",
                        })
                    </script>';
                    exit;
      }
  
  }
  
  ?>
  

<?php if($userdata["role"] == 'Admin'){  ?>
<!-- HTML Form for API Settings -->
<div class="page-content fade-in-up">
<div class="ibox">
<div class="ibox-body">
<h4 class="page-title">Slider Management</h4><br>
 <form class="row mb-4" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    
      <div class="col-md-6 mb-2">
        <label>Title</label>
    <input type="text" name="title" placeholder="Title 10 words" class="form-control" required="" />
    </div>
      <div class="col-md-6 mb-2">
        <label>Image</label>
    <input type="file" name="image" class="form-control" required="" />
    </div>
    
    <div class="col-md-12 mb-2 mt-2"><button type="submit" name="create" class="btn btn-primary btn-sm">Submit</button>
    </div>

</form>
<h4 class="page-title">List Of Slider</h4><br>
	<div class="table-responsive">
								<table class="table table-sm table-hover table-bordered table-head-bg-primary" id="dataTable" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>User</th>
												<th>Title</th>
												<th>Image</th>
												<th>Date</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$query = "SELECT * FROM `popup_alert`";
$query_run = mysqli_query($conn, $query);

if ($query_run) {
    while ($row = mysqli_fetch_assoc($query_run)) {
     
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id'], ENT_QUOTES, 'UTF-8') . "</td>";
        echo "<td>All</td>";
echo "<td>" . htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8') . "</td>";
echo "<td> <img src='" .$row['img']. "' width='100px' /></td>";
echo "<td>" . htmlspecialchars($row['date'], ENT_QUOTES, 'UTF-8') . "</td>";

     ?>
       <td>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <input type="hidden" name="srno" value="<?php echo $row['id']; ?>">
            <button class="btn btn-danger" name="delete">Delete</button>
        </form>
     </td>
     
     <?php
        echo "</tr>";
    }
} else {
    echo "Error in query: " . mysqli_error($conn); 
}
?>
											
										</tbody>
									</table>
							</div>
</div>
</div>
</div>
       <?php } ?>
   

<!-- Include necessary scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/js/ready.min.js"></script>
 <script src="assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
</body>
</html>