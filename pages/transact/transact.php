<?php include_once('../../include/config.php');
  include_once('../../include/config2.php');
  include '../../include/sidebar.php';
if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){

  $row  = $db->getAllRecords('users','*',' AND id="'.$_REQUEST['editId'].'"');
  $temp = $_REQUEST['editId'];
  $productrow = $db->getAllRecords('product1','*',' AND product_quantity="'.$_REQUEST['editId'].'"');
$userCount  = $db->getQueryCount('cardata',$temp);

}
$sql = "SELECT * FROM product1 where product_quantity=$temp";
$result = $con->query($sql);

$sql2 = " SELECT  * FROM   users  JOIN transacttable ON users.id = transacttable.custid 
      
      WHERE   users.id = '$temp'";
      



if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){

  extract($_REQUEST);

  if($username==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);

    exit;

  }elseif($useremail==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);

    exit;

  }elseif($userphone==""){

    header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);

    exit;

  }
  

  $data = array(

          'username'=>$username,

          'useremail'=>$useremail,

          'userphone'=>$userphone,


          );

  $update = $db->update('users',$data,array('id'=>$editId));

  if($update){

    header('location: index.php?msg=rus');

    exit;

  }else{

    header('location: index.php?msg=rnu');

    exit;

  }

}

?>

<!doctype html>

<html lang="en-US">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <meta name="description" content="PHP CRUD with search and pagination in bootstrap 4">
  <meta name="keywords" content="PHP CRUD, CRUD with search and pagination, bootstrap 4, PHP">
  <meta name="robots" content="index,follow">
  <title>Services</title>


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">


</head>



<body>

  

  

    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Transaction</h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> 
               <thead>
                   <tr>
                     <th width="19%">Plate  Number</th>
                     <th>Number of Servicees</th>
                     <th width="13%">Total Price</th>
                     <th width="11%">Action</th>
                   </tr>
               </thead>
          <tbody>
  <?php 
$result2 = $con->query($sql2);
             while($row = $result2->fetch_assoc()) {
                echo "<tr>";
             echo "<td>".$row['userphone']."</td>";
              echo "<td>".$row['numofitem']."</td>";
              echo "<td>".$row['cashtotal']."</td>";
            echo '<td align="right">
            <a type="button" class="btn btn-primary bg-gradient-primary" href="transact_view.php?action=edit & id='.$row['transid'] . '"><i class="fas fa-fw fa-th-list"></i> View</a>
            </div> </td>';      
  }






  

     ?>

                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                  </div>



    
    <?php

    if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){

      echo  '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';

    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){

      echo  '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';

    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){

      echo  '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';

    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){

      echo  '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';

    }elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){

      echo  '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';

    }

    ?>

  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/jquery.caret/0.1/jquery.caret.js"></script>
  <script src="https://www.solodev.com/_/assets/phone/jquery.mobilePhoneNumber.js"></script>
  <script>
    $(document).ready(function() {
    jQuery(function($){
        var input = $('[type=tel]')
        input.mobilePhoneNumber({allowPhoneWithoutPrefix: '+1'});
        input.bind('country.mobilePhoneNumber', function(e, country) {
        $('.country').text(country || '')
        })
       });
    });
  </script>
    

</body>

</html>