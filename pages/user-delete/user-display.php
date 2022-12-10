

<?php
include_once('../../include/config2.php');
include ('../../include/sidebar.php');
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$price = $_POST['price'];	
	
	// checking empty fields
	if(empty($name) || empty($qty) || empty($price)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($qty)) {
			echo "<font color='red'>Quantity field is empty.</font><br/>";
		}
		
		if(empty($price)) {
			echo "<font color='red'>Price field is empty.</font><br/>";
		}		
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE products SET name='$name', qty='$qty', price='$price' WHERE id=$id");
		
	
		header("Location: user-edit.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['editId'];

$sql = "SELECT * FROM users where id=$id";
$sql3 = "SELECT * from cardata where id = $id";
$result = $con->query($sql);
  if ($result->num_rows > 0) {
 
             while($row = $result->fetch_assoc()) {
                echo "<tr>";
              
                $temp5 = $row['userphone'];
                $tempname = $row['username'];   
                $tempphone = $row['userphone'];
                $tempemail = $row['useremail'];

  }



} else {
  echo "0 results";
}



?>
<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Customer's Contact</h4>
            </div>
            <a href="../../index.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
            <div class="card-body">
                

                    <div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          Full Name<br>
                        </h5>
                      </div>

                      <div class="col-sm-9">
                        <h5>
                          :  <?php echo $tempname; ?> <br>
                        </h5>
                      </div>

                    </div>
										<div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          User Email #<br>
                        </h5>
                      </div>
                      

                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempemail; ?> <br>
                        </h5>
                      </div>
                      
                    </div>
                    <div class="form-group row text-left">

                      <div class="col-sm-3 text-primary">
                        <h5>
                          Contact #<br>
                        </h5>
                      </div>


                      <div class="col-sm-9">
                        <h5>
                          : <?php echo $tempphone; ?> <br>
                        </h5>
                      </div>
                      
                    </div>
            </div>
          </div>

<center><div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Car Model & Plate Number<a href="../../pages/users/user-plate.php?editId=<?php echo $id ?>" type="button" class="btn btn-primary bg-gradient-primary "style="margin-left: 12%;position: absolute;"> <i class="fa fa-fw fa-plus-circle"></i>  Add  </a></h4> 

            </div>
           
            <div class="card-body">
                

                    <div class="form-group row ">
 <table class="table table-striped table-bordered">
                       	
                <tbody>
                	<?php 
$sql = "SELECT * FROM cardata where plateid=$id";

$result = $con->query($sql);
  if ($result->num_rows > 0) {
 									echo '<thead>';
              echo '<tr class="bg-primary text-white">';
              echo '<th>Car Model</th>';
              echo '<th>Plate Number</th>';
              echo '</tr>';
              echo '</thead>';
             while($row = $result->fetch_assoc()) {
             
                echo "<tr>";
              	echo '<td><h4><strong>'.$row['carbrand'].'</strong></h4></td>';
              	echo '<td><h4>'.$row['userphone'].'</h4></td>';
               }

}else{

  echo '<h3>0 Result</h3>';

}



                	?>
                </tbody>
                       </table>
                      <div class="col-sm-3 text-primary">
                       
                      </div>

                      <div class="col-sm-9">
                      

                      </div>

                    </div>
										<div class="form-group row text-left">

                      

                      
            </div>
          </div>
