<?php
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../../login/login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../../login/login.php");
  }
?>


<?php
include_once'../../include/config.php';
include_once'../../include/config2.php';
include'../../include/sidebar.php';
  $tempo = "";
$tempo = $_GET['id'];
$platenum="";
$sql3 = "SELECT * FROM item WHERE quantity ='$tempo'";

$sql2 = " SELECT  * FROM   product1  JOIN transacttable ON product1.product_id = transacttable.transid JOIN users on users.id = transacttable.custid
      WHERE   product1.product_id = '$tempo'";
?>
  

            
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="form-group row text-left mb-0">
                <div class="col-sm-9">
                  <h5 class="font-weight-bold">
                    Transaction and Details
                  </h5>
                </div>
                <div class="col-sm-3 py-1">
                  <h6>
                    <?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
                   $tempdate = $row['transdate'];
                   }?>
                    Date: <?php echo $tempdate ?>
                  </h6>
                </div>
              </div>
<hr>
              <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1">
                  <h6 class="font-weight-bold">
                     <?php  
           $result3 = $con->query($sql3);
              while($row = $result3->fetch_assoc()) {
                   $platenum = $row['platenum'];
                   }?>
                    
                    Plate Number : <?php echo $platenum ?>
                  </h6>
                  <h6 >   <?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
                   $tempdate = $row['userphone'];
                   }?>
                  
                    Phone: <?php echo  $tempdate ?>
                  </h6>
                </div>
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h6>
                    Transaction # 
                  </h6>
                  <h6 class="font-weight-bold">
                     <?php  
           $result3 = $con->query($sql3);
              while($row = $result3->fetch_assoc()) {
                   $tempen = $row['encoder'];
                   }?>
                    
                    <!--  Encoder : <?php echo $tempen ?> -->
                   
                  </h6>
                  <h6>
                   
                  </h6>
                </div>
              </div>
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Services</th>
             
                <th width="20%">Price</th>
               
              </tr>
            </thead>
            <tbody>
<?php  
           $result2 = $con->query($sql2);
              while($row = $result2->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row['product_name']."</td>";
             
              echo "<td>".$row['product_price']."</td>";
              $temptotal = $row['cashtotal'];
            
              $tempdate = $row['transdate'];
              echo "</tr>";
                        }
?>
            </tbody>
          </table>
            <div class="form-group row text-left mb-0 py-2">
                <div class="col-sm-4 py-1"></div>
                <div class="col-sm-3 py-1"></div>
                <div class="col-sm-4 py-1">
                  <h4>
                    Total Amount: ₱ <?php echo "$temptotal"; ?>
                  </h4>
                  <table width="100%">
             <!--       <tr>
                      <td class="font-weight-bold">Subtotal</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Less VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Net of VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                      <td class="font-weight-bold">Add VAT</td>
                      <td class="text-right">₱ </td>
                    </tr>
                    <tr>
                    -->
                      <td class="font-weight-bold">Total Cash : ₱  <a type="button" class="btn btn-primary bg-gradient-primary" href="transact-bill2.php?editId=<?php echo $tempo ;?>"><i class="fas fa-fw fa-list-alt"></i> Details</a> </td>

                      <td class="font-weight-bold text-right text-primary"></td>
                      
                    </tr>

                  </table>
                </div>
                <div class="col-sm-1 py-1"></div>
              </div>
            </div>
          </div>


<?php

?>
